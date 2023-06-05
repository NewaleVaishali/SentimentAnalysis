function readCSV(filePath, callback) {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        const csvData = xhr.responseText;
        callback(csvData);
      }
    };
    xhr.open('GET', filePath, true);
    xhr.send();
  }
  
  function parseCSV(csvData) {
    const rows = csvData.split('\n');

    const columnIndex = 1;
    let sum = 0;
    let sumN = 0;
    let sumNeu = 0;
    let total = 0; 
  
    const values = [];
  
    for (let i = 0; i < rows.length; i++) {
      const columns = rows[i].split(',');
      //values.push(columns);
  
      //
      if (columnIndex >= 0 && columnIndex < columns.length) {
          const value = parseFloat(columns[columnIndex]);
          sum += isNaN(value) ? 0 : value;

          const valueN = parseFloat(columns[2]);
          sumN += isNaN(valueN) ? 0 : valueN;

          const valueNeu = parseFloat(columns[3]);
          sumNeu += isNaN(valueNeu) ? 0 : valueNeu;

        }
  
    }
    values.push(sum);
    values.push(sumN);
    values.push(sumNeu);
    total=sum+sumN+sumNeu;
    values.push(total);
  
    return values;
  }

  
  function displayCSVValues(values) {
    const outputElement = document.getElementById('output');
    var divContent = document.getElementById('output').innerHTML;

    if (divContent === "Positive") {
      outputElement.innerHTML = values[0];
    }
    const outputElement2 = document.getElementById('outputNeg');
    outputElement2.innerHTML = values[1];

    const outputElement3 = document.getElementById('outputNeu');
    outputElement3.innerHTML = values[2];

    const outputElement4 = document.getElementById('Total');
    outputElement4.innerHTML = values[3];
  }
  
  // Usage example
  const filePath = 'counts.csv';
  
  readCSV(filePath, function(csvData) {
    const values = parseCSV(csvData);
    displayCSVValues(values);
  });
  