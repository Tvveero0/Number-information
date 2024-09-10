<?php
// Sample JSON data from the example
$jsonData = '{
    "results":[
        {
            "gender":"male",
            "name":{"title":"Mr","first":"Topias","last":"Kivela"},
            "location":{"street":{"number":9087,"name":"Itsenäisyydenkatu"},"city":"Kaarina","state":"Kymenlaakso","country":"Finland","postcode":97980,"coordinates":{"latitude":"-26.2014","longitude":"-136.9972"},"timezone":{"offset":"+9:00","description":"Tokyo, Seoul, Osaka, Sapporo, Yakutsk"}},
            "email":"topias.kivela@example.com",
            "login":{"uuid":"e5ee434f-ab24-4c86-a531-fea534e8740e","username":"brownbutterfly956","password":"ducati"},
            "dob":{"date":"1995-11-27T08:55:45.229Z","age":28},
            "phone":"03-285-430",
            "cell":"048-794-88-55",
            "id":{"name":"HETU","value":"NaNNA227undefined"},
            "picture":{"large":"https://randomuser.me/api/portraits/men/36.jpg"},
            "nat":"FI"
        }
    ]
}';

// Decode the JSON data
$data = json_decode($jsonData, true);

// Get the phone number from the POST request
$phoneNumber = $_POST['phoneNumber'];

// Function to search for the number
function searchNumber($number, $data) {
    foreach ($data['results'] as $result) {
        if ($result['phone'] == $number || $result['cell'] == $number) {
            return $result;
        }
    }
    return null;
}

// Search for the phone number
$user = searchNumber($phoneNumber, $data);

if ($user) {
    echo "<p><strong>Name:</strong> " . $user['name']['first'] . " " . $user['name']['last'] . "</p>";
    echo "<p><strong>Email:</strong> " . $user['email'] . "</p>";
    echo "<p><strong>Phone:</strong> " . $user['phone'] . "</p>";
    echo "<p><strong>Cell:</strong> " . $user['cell'] . "</p>";
    echo "<img src='" . $user['picture']['large'] . "' alt='Profile Picture'>";
} else {
    echo "No information found for this number.";
}
?>