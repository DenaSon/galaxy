/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: charts apex pie init Js File
*/

// rgb to hex convert
function rgbToHex(rgb) {
    // Extract RGB values using regular expressions
    const rgbValues = rgb.match(/\d+/g);

    if (rgbValues.length === 3) {
        var [r, g, b] = rgbValues.map(Number);
    }
    // Ensure the values are within the valid range (0-255)
    r = Math.max(0, Math.min(255, r));
    g = Math.max(0, Math.min(255, g));
    b = Math.max(0, Math.min(255, b));

    // Convert each component to its hexadecimal representation
    const rHex = r.toString(16).padStart(2, '0');
    const gHex = g.toString(16).padStart(2, '0');
    const bHex = b.toString(16).padStart(2, '0');

    // Combine the hexadecimal values with the "#" prefix
    const hexColor = `#${rHex}${gHex}${bHex}`;

    return hexColor.toUpperCase(); // Convert to uppercase for consistency
}

// common function to get charts colors from class
function getChartColorsArray(chartId) {
    const chartElement = document.getElementById(chartId);
    if (chartElement) {
        const colors = chartElement.dataset.chartColors;
        if (colors) {
            const parsedColors = JSON.parse(colors);
            const mappedColors = parsedColors.map((value) => {
                const newValue = value.replace(/\s/g, "");
                if (!newValue.includes("#")) {
                    const element = document.querySelector(newValue);
                    if (element) {
                        const styles = window.getComputedStyle(element);
                        const backgroundColor = styles.backgroundColor;
                        return backgroundColor || newValue;
                    } else {
                        const divElement = document.createElement('div');
                        divElement.className = newValue;
                        document.body.appendChild(divElement);

                        const styles = window.getComputedStyle(divElement);
                        const backgroundColor = styles.backgroundColor.includes("#") ? styles.backgroundColor : rgbToHex(styles.backgroundColor);
                        return backgroundColor || newValue;
                    }
                } else {
                    return newValue;
                }
            });
            return mappedColors;
        } else {
            console.warn(`chart-colors attribute not found on: ${chartId}`);
        }
    }
}

//simple pie
var options = {
    series: [44, 55, 13, 43, 22],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'pie',
    },
    labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
    colors: getChartColorsArray("simplePie"),
    legend: {
        position: 'bottom'
    }
};

var chart = new ApexCharts(document.querySelector("#simplePie"), options);
chart.render();

//Simple Donut
var options = {
    series: [44, 55, 41, 17, 15],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'donut',
    },
    colors: getChartColorsArray("simpleDonut"),
    legend: {
        position: 'bottom'
    },
};

var chart = new ApexCharts(document.querySelector("#simpleDonut"), options);
chart.render();

//Donut Update
var options = {
    series: [44, 55, 13, 33],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        width: 380,
        type: 'donut',
    },
    dataLabels: {
        enabled: false
    },
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
                width: 200
            },
            legend: {
                show: false
            }
        }
    }],
    colors: getChartColorsArray("updatingDonutChart"),
    legend: {
        position: 'right',
        offsetY: 0,
        height: 230,
    }
};

var chart = new ApexCharts(document.querySelector("#updatingDonutChart"), options);
chart.render();


function appendData() {
    var arr = chart.w.globals.series.slice()
    arr.push(Math.floor(Math.random() * (100 - 1 + 1)) + 1)
    return arr;
}

function removeData() {
    var arr = chart.w.globals.series.slice()
    arr.pop()
    return arr;
}

function randomize() {
    return chart.w.globals.series.map(function () {
        return Math.floor(Math.random() * (100 - 1 + 1)) + 1
    })
}

function reset() {
    return options.series
}

document.querySelector("#randomize").addEventListener("click", function () {
    chart.updateSeries(randomize())
})

document.querySelector("#add").addEventListener("click", function () {
    chart.updateSeries(appendData())
})

document.querySelector("#remove").addEventListener("click", function () {
    chart.updateSeries(removeData())
})

document.querySelector("#reset").addEventListener("click", function () {
    chart.updateSeries(reset())
})

//Monochrome Pie
var options = {
    series: [25, 15, 44, 55, 41, 17],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 300,
        width: '100%',
        type: 'pie',
    },
    labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
    theme: {
        monochrome: {
            enabled: true
        }
    },
    plotOptions: {
        pie: {
            dataLabels: {
                offset: -5
            }
        }
    },
    dataLabels: {
        formatter(val, opts) {
            const name = opts.w.globals.labels[opts.seriesIndex]
            return [name, val.toFixed(1) + '%']
        }
    },
    theme: {
        monochrome: {
            enabled: true,
            color: getChartColorsArray("monochromePieChart")[0],
            shadeTo: 'light',
            shadeIntensity: 0.6
        }
    },
    legend: {
        show: false
    }
};

var chart = new ApexCharts(document.querySelector("#monochromePieChart"), options);
chart.render();

//Gradient Donut
var options = {
    series: [44, 55, 41, 17, 15],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 280,
        type: 'donut',
    },
    plotOptions: {
        pie: {
            startAngle: -90,
            endAngle: 270
        }
    },
    dataLabels: {
        enabled: false
    },
    fill: {
        type: 'gradient',
    },
    colors: getChartColorsArray("gradientDonut"),
    legend: {
        formatter: function (val, opts) {
            return val + " - " + opts.w.globals.series[opts.seriesIndex]
        }
    },
    legend: {
        position: 'bottom'
    }
};

var chart = new ApexCharts(document.querySelector("#gradientDonut"), options);
chart.render();

//Semi Donut
var options = {
    series: [44, 55, 41, 17, 15],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 280,
        type: 'donut'
    },
    plotOptions: {
        pie: {
            startAngle: -90,
            endAngle: 90,
            offsetY: 5
        }
    },
    grid: {
        padding: {
            bottom: -80
        }
    },
    colors: getChartColorsArray("semiDonut"),
    legend: {
        position: 'bottom'
    }
};

var chart = new ApexCharts(document.querySelector("#semiDonut"), options);
chart.render();

//Donut with Pattern
var options = {
    series: [44, 55, 41, 17, 15],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'donut',
        dropShadow: {
            enabled: true,
            color: '#111',
            top: -1,
            left: 3,
            blur: 3,
            opacity: 0.2
        }
    },
    stroke: {
        width: 0,
    },
    plotOptions: {
        pie: {
            donut: {
                labels: {
                    show: true,
                    total: {
                        showAlways: true,
                        show: true
                    }
                }
            }
        }
    },
    labels: ["Comedy", "Action", "SciFi", "Drama", "Horror"],
    dataLabels: {
        dropShadow: {
            blur: 3,
            opacity: 0.8
        }
    },
    fill: {
        type: 'pattern',
        opacity: 1,
        pattern: {
            enabled: true,
            style: ['verticalLines', 'squares', 'horizontalLines', 'circles', 'slantedLines'],
        },
    },
    states: {
        hover: {
            filter: 'none'
        }
    },
    colors: getChartColorsArray("donutWithPattern"),
    theme: {
        palette: 'palette2'
    },
    legend: {
        position: 'bottom'
    }
};

var chart = new ApexCharts(document.querySelector("#donutWithPattern"), options);
chart.render();

//Pie with Image
var options = {
    series: [44, 33, 54, 45],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'pie',
    },
    colors: getChartColorsArray("pieWithImage"),
    fill: {
        type: 'image',
        opacity: 0.85,
        image: {
            src: ['../../assets/images/small/img-1.jpg', '../../assets/images/small/img-2.jpg', '../../assets/images/small/img-6.jpg', '../../assets/images/small/img-4.jpg'],
            width: 25,
            imagedHeight: 25
        },
    },
    stroke: {
        width: 4
    },
    dataLabels: {
        enabled: true,
        style: {
            colors: ['#111']
        },
        background: {
            enabled: true,
            foreColor: '#fff',
            borderWidth: 0
        }
    },
    legend: {
        position: 'bottom'
    }
};

var chart = new ApexCharts(document.querySelector("#pieWithImage"), options);
chart.render();