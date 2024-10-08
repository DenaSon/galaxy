/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: charts apex line init Js File
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

var options = {
    series: [{
        name: "Desktops",
        data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'line',
        zoom: {
            enabled: false
        },
        margin: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'straight'
    },
    title: {
        text: 'Product Trends by Month',
        align: 'left'
    },
    colors: getChartColorsArray("chartLine"),
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
    }
};

var chart = new ApexCharts(document.querySelector("#chartLine"), options);
chart.render();

// Line with Data Labels
var dataLabelOptions = {
    series: [
        {
            name: "High - 2013",
            data: [28, 29, 33, 36, 32, 32, 33]
        },
        {
            name: "Low - 2013",
            data: [12, 11, 14, 18, 17, 13, 13]
        }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'line',
        dropShadow: {
            enabled: true,
            color: '#000',
            top: 18,
            left: 7,
            blur: 10,
            opacity: 0.2
        },
        toolbar: {
            show: false
        }
    },
    colors: getChartColorsArray("lineWithDataLabel"),
    dataLabels: {
        enabled: true,
    },
    stroke: {
        curve: 'smooth'
    },
    markers: {
        size: 1
    },
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        title: {
            text: 'Month'
        }
    },
    yaxis: {
        title: {
            text: 'Temperature'
        },
        min: 5,
        max: 40
    },
    legend: {
        position: 'top',
        horizontalAlign: 'right',
        floating: true,
        offsetY: -25,
        offsetX: -5
    }
};

var chart = new ApexCharts(document.querySelector("#lineWithDataLabel"), dataLabelOptions);
chart.render();

//Zoomable Timeseries
var options = {
    series: [{
        name: 'XYZ MOTORS',
        data: [{
            x: new Date('2023-01-12').getTime(),
            y: 140
        }, {
            x: new Date('2023-01-13').getTime(),
            y: 147
        }, {
            x: new Date('2023-01-14').getTime(),
            y: 150
        }, {
            x: new Date('2023-01-15').getTime(),
            y: 154
        }, {
            x: new Date('2023-01-16').getTime(),
            y: 160
        }, {
            x: new Date('2023-01-17').getTime(),
            y: 165
        }, {
            x: new Date('2023-01-18').getTime(),
            y: 162
        }, {
            x: new Date('2023-01-20').getTime(),
            y: 159
        }, {
            x: new Date('2023-01-21').getTime(),
            y: 164
        }, {
            x: new Date('2023-01-22').getTime(),
            y: 160
        }, {
            x: new Date('2023-01-23').getTime(),
            y: 165
        }, {
            x: new Date('2023-01-24').getTime(),
            y: 169
        }, {
            x: new Date('2023-01-25').getTime(),
            y: 172
        }, {
            x: new Date('2023-01-26').getTime(),
            y: 177
        }, {
            x: new Date('2023-01-27').getTime(),
            y: 173
        }, {
            x: new Date('2023-01-28').getTime(),
            y: 169
        }, {
            x: new Date('2023-01-29').getTime(),
            y: 163
        }, {
            x: new Date('2023-01-30').getTime(),
            y: 158
        }, {
            x: new Date('2023-02-01').getTime(),
            y: 153
        }, {
            x: new Date('2023-02-02').getTime(),
            y: 149
        }, {
            x: new Date('2023-02-03').getTime(),
            y: 144
        }, {
            x: new Date('2023-02-05').getTime(),
            y: 150
        }, {
            x: new Date('2023-02-06').getTime(),
            y: 155
        }, {
            x: new Date('2023-02-07').getTime(),
            y: 159
        }, {
            x: new Date('2023-02-08').getTime(),
            y: 163
        }, {
            x: new Date('2023-02-09').getTime(),
            y: 156
        }, {
            x: new Date('2023-02-11').getTime(),
            y: 151
        }, {
            x: new Date('2023-02-12').getTime(),
            y: 157
        }, {
            x: new Date('2023-02-13').getTime(),
            y: 161
        }, {
            x: new Date('2023-02-14').getTime(),
            y: 150
        }, {
            x: new Date('2023-02-15').getTime(),
            y: 154
        }, {
            x: new Date('2023-02-16').getTime(),
            y: 160
        }, {
            x: new Date('2023-02-17').getTime(),
            y: 165
        }, {
            x: new Date('2023-02-18').getTime(),
            y: 162
        }, {
            x: new Date('2023-02-20').getTime(),
            y: 159
        }, {
            x: new Date('2023-02-21').getTime(),
            y: 164
        }, {
            x: new Date('2023-02-22').getTime(),
            y: 160
        }, {
            x: new Date('2023-02-23').getTime(),
            y: 165
        }, {
            x: new Date('2023-02-24').getTime(),
            y: 169
        }, {
            x: new Date('2023-02-25').getTime(),
            y: 172
        }, {
            x: new Date('2023-02-26').getTime(),
            y: 177
        }, {
            x: new Date('2023-02-27').getTime(),
            y: 173
        }, {
            x: new Date('2023-02-28').getTime(),
            y: 169
        }, {
            x: new Date('2023-02-29').getTime(),
            y: 163
        }, {
            x: new Date('2023-02-30').getTime(),
            y: 162
        }, {
            x: new Date('2023-03-01').getTime(),
            y: 158
        }, {
            x: new Date('2023-03-02').getTime(),
            y: 152
        }, {
            x: new Date('2023-03-03').getTime(),
            y: 147
        }, {
            x: new Date('2023-03-05').getTime(),
            y: 142
        }, {
            x: new Date('2023-03-06').getTime(),
            y: 147
        }, {
            x: new Date('2023-03-07').getTime(),
            y: 151
        }, {
            x: new Date('2023-03-08').getTime(),
            y: 155
        }, {
            x: new Date('2023-03-09').getTime(),
            y: 159
        }, {
            x: new Date('2023-03-11').getTime(),
            y: 162
        }, {
            x: new Date('2023-03-12').getTime(),
            y: 157
        }, {
            x: new Date('2023-03-13').getTime(),
            y: 161
        }, {
            x: new Date('2023-03-14').getTime(),
            y: 166
        }, {
            x: new Date('2023-03-15').getTime(),
            y: 169
        }, {
            x: new Date('2023-03-16').getTime(),
            y: 172
        }, {
            x: new Date('2023-03-17').getTime(),
            y: 177
        }, {
            x: new Date('2023-03-18').getTime(),
            y: 181
        }, {
            x: new Date('2023-03-20').getTime(),
            y: 178
        }, {
            x: new Date('2023-03-21').getTime(),
            y: 173
        }, {
            x: new Date('2023-03-22').getTime(),
            y: 169
        }, {
            x: new Date('2023-03-23').getTime(),
            y: 163
        }, {
            x: new Date('2023-03-24').getTime(),
            y: 159
        }, {
            x: new Date('2023-03-25').getTime(),
            y: 164
        }, {
            x: new Date('2023-03-26').getTime(),
            y: 168
        }, {
            x: new Date('2023-03-27').getTime(),
            y: 172
        }, {
            x: new Date('2023-03-28').getTime(),
            y: 169
        }, {
            x: new Date('2023-03-29').getTime(),
            y: 163
        }, {
            x: new Date('2023-03-30').getTime(),
            y: 162
        }, {
            x: new Date('2023-04-01').getTime(),
            y: 158
        }, {
            x: new Date('2023-04-02').getTime(),
            y: 152
        }, {
            x: new Date('2023-04-03').getTime(),
            y: 147
        }, {
            x: new Date('2023-04-05').getTime(),
            y: 142
        }, {
            x: new Date('2023-04-06').getTime(),
            y: 147
        }, {
            x: new Date('2023-04-07').getTime(),
            y: 151
        }, {
            x: new Date('2023-04-08').getTime(),
            y: 155
        }, {
            x: new Date('2023-04-09').getTime(),
            y: 159
        }, {
            x: new Date('2023-04-11').getTime(),
            y: 162
        }, {
            x: new Date('2023-04-12').getTime(),
            y: 157
        }, {
            x: new Date('2023-04-13').getTime(),
            y: 161
        }, {
            x: new Date('2023-04-14').getTime(),
            y: 166
        }, {
            x: new Date('2023-04-15').getTime(),
            y: 169
        }, {
            x: new Date('2023-04-16').getTime(),
            y: 172
        }, {
            x: new Date('2023-04-17').getTime(),
            y: 177
        }, {
            x: new Date('2023-04-18').getTime(),
            y: 181
        }, {
            x: new Date('2023-04-20').getTime(),
            y: 178
        }, {
            x: new Date('2023-04-21').getTime(),
            y: 173
        }, {
            x: new Date('2023-04-22').getTime(),
            y: 169
        }, {
            x: new Date('2023-04-23').getTime(),
            y: 163
        }, {
            x: new Date('2023-04-24').getTime(),
            y: 159
        }, {
            x: new Date('2023-04-25').getTime(),
            y: 164
        }, {
            x: new Date('2023-04-26').getTime(),
            y: 168
        }, {
            x: new Date('2023-04-27').getTime(),
            y: 172
        }, {
            x: new Date('2023-04-28').getTime(),
            y: 169
        }, {
            x: new Date('2023-04-29').getTime(),
            y: 163
        }, {
            x: new Date('2023-04-30').getTime(),
            y: 162
        }, {
            x: new Date('2023-05-01').getTime(),
            y: 158
        }, {
            x: new Date('2023-05-02').getTime(),
            y: 152
        }, {
            x: new Date('2023-05-03').getTime(),
            y: 147
        }, {
            x: new Date('2023-05-04').getTime(),
            y: 142
        }, {
            x: new Date('2023-05-05').getTime(),
            y: 147
        }, {
            x: new Date('2023-05-07').getTime(),
            y: 151
        }, {
            x: new Date('2023-05-08').getTime(),
            y: 155
        }, {
            x: new Date('2023-05-09').getTime(),
            y: 159
        }, {
            x: new Date('2023-05-11').getTime(),
            y: 162
        }, {
            x: new Date('2023-05-12').getTime(),
            y: 157
        }, {
            x: new Date('2023-05-13').getTime(),
            y: 161
        }, {
            x: new Date('2023-05-14').getTime(),
            y: 166
        }, {
            x: new Date('2023-05-15').getTime(),
            y: 169
        }, {
            x: new Date('2023-05-16').getTime(),
            y: 172
        }, {
            x: new Date('2023-05-17').getTime(),
            y: 177
        }, {
            x: new Date('2023-05-18').getTime(),
            y: 181
        }, {
            x: new Date('2023-05-20').getTime(),
            y: 178
        }, {
            x: new Date('2023-05-21').getTime(),
            y: 173
        }, {
            x: new Date('2023-05-22').getTime(),
            y: 169
        }, {
            x: new Date('2023-05-23').getTime(),
            y: 163
        }, {
            x: new Date('2023-05-24').getTime(),
            y: 159
        }, {
            x: new Date('2023-05-25').getTime(),
            y: 164
        }, {
            x: new Date('2023-05-26').getTime(),
            y: 168
        }, {
            x: new Date('2023-05-27').getTime(),
            y: 172
        }, {
            x: new Date('2023-05-28').getTime(),
            y: 169
        }, {
            x: new Date('2023-05-29').getTime(),
            y: 163
        }, {
            x: new Date('2023-05-30').getTime(),
            y: 162
        },]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        type: 'area',
        stacked: false,
        height: 350,
        zoom: {
            type: 'x',
            enabled: true,
            autoScaleYaxis: true
        },
        toolbar: {
            autoSelected: 'zoom'
        }
    },
    dataLabels: {
        enabled: false
    },
    markers: {
        size: 0,
    },
    title: {
        text: 'Stock Price Movement',
        align: 'left'
    },
    colors: getChartColorsArray("zoomableTimeseries"),
    fill: {
        type: 'gradient',
        gradient: {
            shadeIntensity: 1,
            inverseColors: false,
            opacityFrom: 0.5,
            opacityTo: 0,
            stops: [0, 90, 100]
        },
    },
    yaxis: {
        labels: {
            formatter: function (val) {
                return (val / 1000000).toFixed(0);
            },
        },
        title: {
            text: 'Price'
        },
    },
    xaxis: {
        type: 'datetime',
    },
    tooltip: {
        shared: false,
        y: {
            formatter: function (val) {
                return (val / 1000000).toFixed(0)
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#zoomableTimeseries"), options);
chart.render();

//Line Chart with Annotations
var options = {
    series: [{
        data: series.monthDataSeries1.prices
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'line',
        id: 'areachart-2'
    },
    annotations: {
        yaxis: [{
            y: 8200,
            borderColor: '#00E396',
            label: {
                borderColor: '#00E396',
                style: {
                    color: '#fff',
                    background: '#00E396',
                },
                text: 'Support',
            }
        }, {
            y: 8600,
            y2: 9000,
            borderColor: '#000',
            fillColor: '#FEB019',
            opacity: 0.2,
            label: {
                borderColor: '#333',
                style: {
                    fontSize: '10px',
                    color: '#333',
                    background: '#FEB019',
                },
                text: 'Y-axis range',
            }
        }],
        xaxis: [{
            x: new Date('23 Nov 2017').getTime(),
            strokeDashArray: 0,
            borderColor: '#775DD0',
            label: {
                borderColor: '#775DD0',
                style: {
                    color: '#fff',
                    background: '#775DD0',
                },
                text: 'Anno Test',
            }
        }, {
            x: new Date('26 Nov 2017').getTime(),
            x2: new Date('28 Nov 2017').getTime(),
            fillColor: '#B3F7CA',
            opacity: 0.4,
            label: {
                borderColor: '#B3F7CA',
                style: {
                    fontSize: '10px',
                    color: '#fff',
                    background: '#00E396',
                },
                offsetY: -10,
                text: 'X-axis range',
            }
        }],
        points: [{
            x: new Date('01 Dec 2017').getTime(),
            y: 8607.55,
            marker: {
                size: 8,
                fillColor: '#fff',
                strokeColor: 'red',
                radius: 2,
                cssClass: 'apexcharts-custom-class'
            },
            label: {
                borderColor: '#FF4560',
                offsetY: 0,
                style: {
                    color: '#fff',
                    background: '#FF4560',
                },

                text: 'Point Annotation',
            }
        }, {
            x: new Date('08 Dec 2017').getTime(),
            y: 9340.85,
            marker: {
                size: 0
            },
            image: {
                path: '../../../images/'
            }
        }]
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'straight'
    },
    grid: {
        padding: {
            right: 30,
            left: 20
        }
    },
    colors: getChartColorsArray("lineWithAnnotations"),
    title: {
        text: 'Line with Annotations',
        align: 'left'
    },
    labels: series.monthDataSeries1.dates,
    xaxis: {
        type: 'datetime',
    },
};

var chart = new ApexCharts(document.querySelector("#lineWithAnnotations"), options);
chart.render();

// Generate series
function generateDayWiseTimeSeries(baseval, count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
        var x = baseval;
        var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

        series.push([x, y]);
        baseval += 86400000;
        i++;
    }
    return series;
}

var data = generateDayWiseTimeSeries(new Date('11 Feb 2017').getTime(), 185, {
    min: 30,
    max: 90
})

//Brush chart
var options = {
    series: [{
        data: data
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        id: 'chart2',
        type: 'line',
        height: 230,
        toolbar: {
            autoSelected: 'pan',
            show: false
        }
    },
    colors: getChartColorsArray("brushChartLine"),
    stroke: {
        width: 3
    },
    dataLabels: {
        enabled: false
    },
    fill: {
        opacity: 1,
    },
    markers: {
        size: 0
    },
    xaxis: {
        type: 'datetime'
    }
};

var chart = new ApexCharts(document.querySelector("#brushChartLine"), options);
chart.render();

var optionsLine = {
    series: [{
        data: data
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        id: 'chart1',
        height: 130,
        type: 'area',
        brush: {
            target: 'chart2',
            enabled: true
        },
        selection: {
            enabled: true,
            xaxis: {
                min: new Date('19 Jun 2017').getTime(),
                max: new Date('14 Aug 2017').getTime()
            }
        },
    },
    colors: getChartColorsArray("brushChartLine2"),
    fill: {
        type: 'gradient',
        gradient: {
            opacityFrom: 0.91,
            opacityTo: 0.1,
        }
    },
    xaxis: {
        type: 'datetime',
        tooltip: {
            enabled: false
        }
    },
    yaxis: {
        tickAmount: 2
    }
};

var chartLine = new ApexCharts(document.querySelector("#brushChartLine2"), optionsLine);
chartLine.render();

//Stepline
var options = {
    series: [{
        data: [34, 44, 54, 21, 12, 43, 33, 23, 66, 66, 58]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        type: 'line',
        height: 350
    },
    stroke: {
        curve: 'stepline',
    },
    colors: getChartColorsArray("chartStepline"),
    dataLabels: {
        enabled: false
    },
    title: {
        text: 'Stepline Chart',
        align: 'left'
    },
    markers: {
        hover: {
            sizeOffset: 4
        }
    }
};

var chart = new ApexCharts(document.querySelector("#chartStepline"), options);
chart.render();

//Gradient Charts
var options = {
    series: [{
        name: 'Sales',
        data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'line',
    },
    forecastDataPoints: {
        count: 7
    },
    stroke: {
        width: 5,
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001', '4/11/2001', '5/11/2001', '6/11/2001'],
        tickAmount: 10,
        labels: {
            formatter: function (value, timestamp, opts) {
                return opts.dateFormatter(new Date(timestamp), 'dd MMM')
            }
        }
    },
    title: {
        text: 'Forecast',
        align: 'left',
        style: {
            fontSize: "16px",
            color: '#666'
        }
    },
    colors: getChartColorsArray("gradientCharts"),
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            gradientToColors: ['#FDD835'], // added gradient colors
            shadeIntensity: 1,
            type: 'horizontal',
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100, 100, 100]
        },
    },
    yaxis: {
        min: -10,
        max: 40
    }
};

var chart = new ApexCharts(document.querySelector("#gradientCharts"), options);
chart.render();

//Missing / null values
var options = {
    series: [{
        name: 'Peter',
        data: [5, 5, 10, 8, 7, 5, 4, null, null, null, 10, 10, 7, 8, 6, 9]
    }, {
        name: 'Johnny',
        data: [10, 15, null, 12, null, 10, 12, 15, null, null, 12, null, 14, null, null, null]
    }, {
        name: 'David',
        data: [null, null, null, null, 3, 4, 1, 3, 4, 6, 7, 9, 5, null, null, null]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'line',
        zoom: {
            enabled: false
        },
        animations: {
            enabled: false
        }
    },
    colors: getChartColorsArray("missingCharts"),
    stroke: {
        width: [5, 5, 4],
        curve: 'straight'
    },
    labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
    title: {
        text: 'Missing data (null values)'
    },
    xaxis: {
    },
};

var chart = new ApexCharts(document.querySelector("#missingCharts"), options);
chart.render();

//Dashed charts
var options = {
    series: [{
        name: "Session Duration",
        data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
    },
    {
        name: "Page Views",
        data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
    },
    {
        name: 'Total Visits',
        data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
    }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'line',
        zoom: {
            enabled: false
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: [5, 7, 5],
        curve: 'straight',
        dashArray: [0, 8, 5]
    },
    title: {
        text: 'Page Statistics',
        align: 'left'
    },
    legend: {
        tooltipHoverFormatter: function (val, opts) {
            return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
        }
    },
    colors: getChartColorsArray("dashedCharts"),
    markers: {
        size: 0,
        hover: {
            sizeOffset: 6
        }
    },
    xaxis: {
        categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
            '10 Jan', '11 Jan', '12 Jan'
        ],
    },
    tooltip: {
        y: [
            {
                title: {
                    formatter: function (val) {
                        return val + " (mins)"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val + " per session"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
        ]
    },
    grid: {
        borderColor: '#f1f1f1',
    }
};

var chart = new ApexCharts(document.querySelector("#dashedCharts"), options);
chart.render();

// Realtime Charts
var lastDate = 0;
var data = [];
var TICKINTERVAL = 86400000;
var XAXISRANGE = 777600000;

function getDayWiseTimeSeries(baseval, count, yrange) {
    var i = 0;
    while (i < count) {
        var x = baseval;
        var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

        data.push({
            'x': x,
            'y': y
        });
        lastDate = baseval
        baseval += TICKINTERVAL;
        i++;
    }
}

getDayWiseTimeSeries(new Date('11 Feb 2017 GMT').getTime(), 10, {
    min: 10,
    max: 90
})

function getNewSeries(baseval, yrange) {
    var newDate = baseval + TICKINTERVAL;
    lastDate = newDate

    for (var i = 0; i < data.length - 10; i++) {
        // IMPORTANT
        // we reset the x and y of the data which is out of drawing area
        // to prevent memory leaks
        data[i].x = newDate - XAXISRANGE - TICKINTERVAL
        data[i].y = 0
    }

    data.push({
        x: newDate,
        y: Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min
    })
}

function resetData() {
    // Alternatively, you can also reset the data at certain intervals to prevent creating a huge series 
    data = data.slice(data.length - 10, data.length);
}

var options = {
    series: [{
        data: data.slice()
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        id: 'realtime',
        height: 350,
        type: 'line',
        animations: {
            enabled: true,
            easing: 'linear',
            dynamicAnimation: {
                speed: 1000
            }
        },
        toolbar: {
            show: false
        },
        zoom: {
            enabled: false
        }
    },
    dataLabels: {
        enabled: false
    },
    colors: getChartColorsArray("realtimeCharts"),
    stroke: {
        curve: 'smooth'
    },
    title: {
        text: 'Dynamic Updating Chart',
        align: 'left'
    },
    markers: {
        size: 0
    },
    xaxis: {
        type: 'datetime',
        range: XAXISRANGE,
    },
    yaxis: {
        max: 100
    },
    legend: {
        show: false
    },
};

var chart = new ApexCharts(document.querySelector("#realtimeCharts"), options);
chart.render();


window.setInterval(function () {
    getNewSeries(lastDate, {
        min: 10,
        max: 90
    })

    chart.updateSeries([{
        data: data
    }])
}, 1000)