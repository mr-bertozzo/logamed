$(document).ready(function() {
    // AJAX request to fetch data from the server
    $.ajax({
        url: 'fetchData.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Display data on success
            displayData(data);
        },
        error: function(error) {
            console.error('Error fetching data:', error);
            $('#result').html('<p>Error fetching data. Please try again later.</p>');
        }
    });

    // Function to display data in a table on the webpage
    function displayData(data) {
        var resultDiv = $('#result');
        if (data && data.length > 0) {
            var html = '<table border="1">';
            // Create table headers
            html += '<tr><th>Artistid</th><th>Name</th></tr>';

            // Populate table rows with data
            data.forEach(function(item) {
                html += '<tr>';
                html += '<td>' + item.Artistid + '</td>';
                html += '<td>' + item.Name + '</td>';
                html += '</tr>';
            });

            html += '</table>';
            resultDiv.html(html);
        } else {
            resultDiv.html('<p>No data available</p>');
        }
    }
});
