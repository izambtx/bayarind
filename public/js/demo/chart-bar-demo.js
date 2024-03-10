// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var omset_A0 = document.getElementById("CA0").value;
var omset_A1 = document.getElementById("CA1").value;
var omset_A2 = document.getElementById("CA2").value;
var omset_A3 = document.getElementById("CA3").value;
var omset_A4 = document.getElementById("CA4").value;
var omset_A5 = document.getElementById("CA5").value;
var omset_A6 = document.getElementById("CA6").value;
var omset_A7 = document.getElementById("CA7").value;
var omset_A8 = document.getElementById("CA8").value;
var omset_A9 = document.getElementById("CA9").value;

var omset_P0 = document.getElementById("CP0").value;
var omset_P1 = document.getElementById("CP1").value;
var omset_P2 = document.getElementById("CP2").value;
var omset_P3 = document.getElementById("CP3").value;
var omset_P4 = document.getElementById("CP4").value;
var omset_P5 = document.getElementById("CP5").value;
var omset_P6 = document.getElementById("CP6").value;
var omset_P7 = document.getElementById("CP7").value;
var omset_P8 = document.getElementById("CP8").value;
var omset_P9 = document.getElementById("CP9").value;

var omset_F0 = document.getElementById("CF0").value;
var omset_F1 = document.getElementById("CF1").value;
var omset_F2 = document.getElementById("CF2").value;
var omset_F3 = document.getElementById("CF3").value;
var omset_F4 = document.getElementById("CF4").value;
var omset_F5 = document.getElementById("CF5").value;
var omset_F6 = document.getElementById("CF6").value;
var omset_F7 = document.getElementById("CF7").value;
var omset_F8 = document.getElementById("CF8").value;
var omset_F9 = document.getElementById("CF9").value;

var omset_N0 = document.getElementById("CN0").value;
var omset_N1 = document.getElementById("CN1").value;
var omset_N2 = document.getElementById("CN2").value;
var omset_N3 = document.getElementById("CN3").value;
var omset_N4 = document.getElementById("CN4").value;
var omset_N5 = document.getElementById("CN5").value;
var omset_N6 = document.getElementById("CN6").value;
var omset_N7 = document.getElementById("CN7").value;
var omset_N8 = document.getElementById("CN8").value;
var omset_N9 = document.getElementById("CN9").value;

var max_omset = document.getElementById("max_omset").value;
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["2024", "2025", "2026", "2027", "2028", "2029", "2030", "2031", "2032", "2033"],
    datasets: [{
      label: "Semua Transaksi",
      backgroundColor: "#f04161",
      hoverBackgroundColor: "#d41135",
      borderColor: "#f04161",
      data: [omset_A0, omset_A1, omset_A2, omset_A3, omset_A4, omset_A5, omset_A6, omset_A7, omset_A8, omset_A9],
    },{
      label: "Potongan Harga",
      backgroundColor: "#0dcaf0",
      hoverBackgroundColor: "#0baccc",
      borderColor: "#0dcaf0",
      data: [omset_P0, omset_P1, omset_P2, omset_P3, omset_P4, omset_P5, omset_P6, omset_P7, omset_P8, omset_P9],
    },{
      label: "Free Item",
      backgroundColor: "#198754",
      hoverBackgroundColor: "#157347",
      borderColor: "#198754",
      data: [omset_F0, omset_F1, omset_F2, omset_F3, omset_F4, omset_F5, omset_F6, omset_F7, omset_F8, omset_F9],
    },{
      label: "Harga Normal",
      backgroundColor: "#f6c23e",
      hoverBackgroundColor: "#dda20a",
      borderColor: "#f6c23e",
      data: [omset_N0, omset_N1, omset_N2, omset_N3, omset_N4, omset_N5, omset_N6, omset_N7, omset_N8, omset_N9],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'year'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 12
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: max_omset,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});
