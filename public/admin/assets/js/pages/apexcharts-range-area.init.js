/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: charts apex range area init Js File
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

//basic range area charts
var options = {
    series: [
        {
            name: 'New York Temperature',
            data: [
                {
                    x: 'Jan',
                    y: [-2, 4]
                },
                {
                    x: 'Feb',
                    y: [-1, 6]
                },
                {
                    x: 'Mar',
                    y: [3, 10]
                },
                {
                    x: 'Apr',
                    y: [8, 16]
                },
                {
                    x: 'May',
                    y: [13, 22]
                },
                {
                    x: 'Jun',
                    y: [18, 26]
                },
                {
                    x: 'Jul',
                    y: [21, 29]
                },
                {
                    x: 'Aug',
                    y: [21, 28]
                },
                {
                    x: 'Sep',
                    y: [17, 24]
                },
                {
                    x: 'Oct',
                    y: [11, 18]
                },
                {
                    x: 'Nov',
                    y: [6, 12]
                },
                {
                    x: 'Dec',
                    y: [1, 7]
                }
            ]
        }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'rangeArea'
    },
    stroke: {
        curve: 'straight'
    },
    markers: {
        hover: {
            sizeOffset: 5
        }
    },
    colors: getChartColorsArray("basicRangeArea"),
    dataLabels: {
        enabled: false
    },
    yaxis: {
        labels: {
            formatter: (val) => {
                return val + '°C'
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#basicRangeArea"), options);
chart.render();

//Combo
var options = {
    series: [
        {
            type: 'rangeArea',
            name: 'Team B Range',

            data: [
                {
                    x: 'Jan',
                    y: [1100, 1900]
                },
                {
                    x: 'Feb',
                    y: [1200, 1800]
                },
                {
                    x: 'Mar',
                    y: [900, 2900]
                },
                {
                    x: 'Apr',
                    y: [1400, 2700]
                },
                {
                    x: 'May',
                    y: [2600, 3900]
                },
                {
                    x: 'Jun',
                    y: [500, 1700]
                },
                {
                    x: 'Jul',
                    y: [1900, 2300]
                },
                {
                    x: 'Aug',
                    y: [1000, 1500]
                }
            ]
        },

        {
            type: 'rangeArea',
            name: 'Team A Range',
            data: [
                {
                    x: 'Jan',
                    y: [3100, 3400]
                },
                {
                    x: 'Feb',
                    y: [4200, 5200]
                },
                {
                    x: 'Mar',
                    y: [3900, 4900]
                },
                {
                    x: 'Apr',
                    y: [3400, 3900]
                },
                {
                    x: 'May',
                    y: [5100, 5900]
                },
                {
                    x: 'Jun',
                    y: [5400, 6700]
                },
                {
                    x: 'Jul',
                    y: [4300, 4600]
                },
                {
                    x: 'Aug',
                    y: [2100, 2900]
                }
            ]
        },

        {
            type: 'line',
            name: 'Team B Median',
            data: [
                {
                    x: 'Jan',
                    y: 1500
                },
                {
                    x: 'Feb',
                    y: 1700
                },
                {
                    x: 'Mar',
                    y: 1900
                },
                {
                    x: 'Apr',
                    y: 2200
                },
                {
                    x: 'May',
                    y: 3000
                },
                {
                    x: 'Jun',
                    y: 1000
                },
                {
                    x: 'Jul',
                    y: 2100
                },
                {
                    x: 'Aug',
                    y: 1200
                },
                {
                    x: 'Sep',
                    y: 1800
                },
                {
                    x: 'Oct',
                    y: 2000
                }
            ]
        },
        {
            type: 'line',
            name: 'Team A Median',
            data: [
                {
                    x: 'Jan',
                    y: 3300
                },
                {
                    x: 'Feb',
                    y: 4900
                },
                {
                    x: 'Mar',
                    y: 4300
                },
                {
                    x: 'Apr',
                    y: 3700
                },
                {
                    x: 'May',
                    y: 5500
                },
                {
                    x: 'Jun',
                    y: 5900
                },
                {
                    x: 'Jul',
                    y: 4500
                },
                {
                    x: 'Aug',
                    y: 2400
                },
                {
                    x: 'Sep',
                    y: 2100
                },
                {
                    x: 'Oct',
                    y: 1500
                }
            ]
        }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'rangeArea',
        animations: {
            speed: 500
        }
    },
    colors: getChartColorsArray("comboRangeAreaChart"),
    // colors: ['#d4526e', '#33b2df', '#d4526e', '#33b2df'],
    dataLabels: {
        enabled: false
    },
    fill: {
        opacity: [0.24, 0.24, 1, 1]
    },
    forecastDataPoints: {
        count: 2
    },
    stroke: {
        curve: 'straight',
        width: [0, 0, 2, 2]
    },
    legend: {
        show: true,
        customLegendItems: ['Team B', 'Team A'],
        inverseOrder: true
    },
    title: {
        text: 'Range Area with Forecast Line (Combo)'
    },
    markers: {
        hover: {
            sizeOffset: 5
        }
    }
};

var chart = new ApexCharts(document.querySelector("#comboRangeAreaChart"), options);
chart.render();