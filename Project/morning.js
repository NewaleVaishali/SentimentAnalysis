var ctx = document.getElementById('barChart').getContext('2d');
// Define an empty array for the labels and data
var labels = [];
var data = [];
var posdata = [];
var negdata = [];
var neudata = [];

// Use the Fetch API to get the CSV file
fetch('PREDICT_SENTIMENTS/results/counts.csv')
  .then(response => response.text())
  .then(text => {
    // Split the text into an array of lines
    var lines = text.split('\n');
    
    // Loop through the lines and split each line into an array of values
    for (var i = 0; i < lines.length; i++) {
      var values = lines[i].split(',');
      
      // Add the label and data to their respective arrays
      labels.push(values[0]);
      temp=[]
      temp.push(values[1]);
      posdata.push(values[1]);
      temp.push(values[2]);
      negdata.push(values[2]);
      temp.push(values[3]);
      neudata.push(values[3]);
      data.push(temp)
    }

   var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Positive',
                data:posdata,
                backgroundColor: 'rgba(0, 99, 0, 0.6)',
            },
            {
                label: 'Negative',
                data: negdata,
                backgroundColor: 'rgba(0, 99, 132, 0.6)',
          },
          {
            label: 'Neutral',
            data: neudata,
            backgroundColor: 'rgba(0, 0, 132, 0.6)',
      }
        ]
        },
        options: {
            responsive: true
        }
    });
   myChart.update();
    Console.clear()
  });
