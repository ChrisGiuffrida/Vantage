<?php
// Insert into table.
function query_insert($netid, $first_name, $last_name, $status, $department) {
    $link = mysqli_connect('localhost', 'cgiuffri', 'Vantage2017') or die ('Could not connect:' . mysql_error());

    mysqli_select_db($link, 'sqlsneverbetter') or die ('Could not select database');

    if ($stmt = mysqli_prepare($link, "INSERT INTO Domers values (?, ?, ?, ?, ?)")) {
        mysqli_stmt_bind_param($stmt, "sssss", $netid, $first_name, $last_name, $department, $status);

        mysqli_execute($stmt);

        mysqli_close($stmt);

    }
}

// Function to get the raw html data given the URL.
function curl_url($url) {
    $retVal = '0';
    $string = file_get_contents($url);
    if (strcmp($http_response_header[0], 'HTTP/1.1 200 OK') == 0) {
        $retVal = $string;
    }
    return $retVal;
}

// Function to get the attributes given a netid.
function get_attributes($netid) {
    // Create the directory URL link.
    $directory_url = 'https://eds.nd.edu/cgi-bin/nd_ldap_search.pl?ldapfilter=uid=' . $netid . '&ldapheadattr=displayname&displayformat=nd1&searchurl=';

    // Get HTML text.
    $html_text = curl_url($directory_url);

    // Error.
    if (strcmp($html_text, '0') == 0) {
        echo 'Incorrect dir_url'.'<br />';
        return;
    }

    // Get ndGuid.
    $pattern = '/.*ndGuid=nd.edu.\s*([^%]*)/';
    preg_match($pattern, $html_text, $matches);
    $ndGuid = NULL;
    $ndGuid = $matches[1];

    // Check if there is a ndGuid.
    if (!$ndGuid) {
        echo 'No ndGuid'.'<br />';
        return;
    }


    // Create attribute URL link.
    $attribute_url = 'https://eds.nd.edu/cgi-bin/nd_ldap_search.pl?ldapurl=ldap://directory.nd.edu/ndGuid=nd.edu.' . $ndGuid . '%2Cou%3Dpeople%2Co%3DUniversity%20of%20Notre%20Dame%2Cst%3DIndiana%2Cc%3DUS&ldapheadattr=displayname&displayformat=standard';

    // Get HTML text.
    $html_text = curl_url($attribute_url);

    // Error.
    if (strcmp($html_text, '0') == 0) {
        echo 'Incorrect att_url'.'<br />';
        return;
    }

    // 1. Get givenName.
    $pattern = '/.*givenName.*\n<TD><B>([^\<]*)/';
    preg_match($pattern, $html_text, $matches);
    $first_name = $matches[1];

    // 2. Get surname.
    $pattern = '/.*sn.*\n<TD><B>([^\<]*)/';
    preg_match($pattern, $html_text, $matches);
    $last_name = $matches[1];

    // Get year and department.
    $year = NULL;
    $department = NULL;

    // Determine if student or faculty.
    $pattern = '/.*ndAffiliation.*\n<TD><B>([^\<]*)/';
    preg_match($pattern, $html_text, $matches);
    $afilliation = $matches[1];

    if (strcmp($afilliation, 'Student') == 0) {
        // Student.
        // 4. Get year.
        $pattern = '/.*ndLevel.*\n<TD><B>([^\<]*)/';
        preg_match($pattern, $html_text, $matches);
        $year = $matches[1];

        // 5. Get ndCurriculum.
        $pattern = '/.*ndCurriculum.*\n<TD><B>([^\<]*)/';
        preg_match($pattern, $html_text, $matches);
        $department = $matches[1];
    } else {
        // Not student.
        // Set year to NULL.
        $year = 'Professor';

        // 5. Get department.
        $pattern = '/.*ndDepartment.*\n<TD><B>([^\<]*)/';
        preg_match($pattern, $html_text, $matches);
        $department = $matches[1];
    }

    echo $netid;
    echo $first_name;
    echo $last_name;
    echo $year;
    echo $department.'<br />';
    query_insert($netid, $first_name, $last_name, $year, $department);
}

// Main function.
function main() {
    $file = fopen('eg_ug_netids.txt', 'r'); //read line one by one
    $values='';
    while (($netid = fgets($file, 4096)) !== false) // Loop til end of file.
    {
        $netid = rtrim($netid);
        get_attributes($netid);
    }
    fclose($file);
}

// Call main function.
main();

?>
