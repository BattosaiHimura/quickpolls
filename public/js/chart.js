var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
var randomColorFactor = function() {
        return Math.round(Math.random() * 255);
    };
var randomColor = function(opacity) {
        return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
    };

var configCourse = {
        data: {
            datasets: [{
                data: [
                    randomScalingFactor(), //get data
                    randomScalingFactor(), 
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",
                    "#949FB1",
                    "#4D5360",
                ],
                label: 'Risultati sondaggio ' // for legend
            }],
            labels: [
                "Capito nulla",
                "Capito poco",
                "Capito qualcosa",
                "Capito abbastanza",
                "Capito tutto" 
            ] 
        },
        options: {
            responsive: true,
            legend: {
                display: false,
                fullWidth: false,
                fontSize: 0,
                // position: 'bottom'
            }, 
            title: {
                display: false,
                text: 'Dati Generali per Sicurezza delle Reti'
            },
            scale: {
              ticks: {
                beginAtZero: true
              },
              reverse: false
            },
            animation: {
                animateRotate: true
            },
        }
    };

var configPoll = {
        data: {
            datasets: [{
                data: [
                    randomScalingFactor(), //get data
                    randomScalingFactor(), 
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",
                    "#949FB1",
                    "#4D5360",
                ],
                //label: 'Risultati sondaggio ' // for legend
            }],
            labels: [
                "Capito nulla",
                "Capito poco",
                "Capito qualcosa",
                "Capito abbastanza",
                "Capito tutto"
            ]
        },
        options: {
            responsive: true,
            legend: {
                display: false,
            },
            title: {
                display: false,
                text: 'Dati Generali per Sicurezza delle Reti'
            },
            scale: {
              ticks: {
                beginAtZero: true
              },
              reverse: false
            },
            animation: {
                animateRotate: true
            },

        }
    };


    window.onload = function() {
        var ctx = document.getElementById("chart-area");
        window.myPolarArea = Chart.PolarArea(ctx, configCourse);
        var ctxA = document.getElementById("chart-areaA");
        window.myPolarAreaA = Chart.PolarArea(ctxA, configPoll);
    };
/*
* La seguente funzione prendeva un button chiamato #randomize e sostanzialmente aggiorna dei valori
*/
    $('#randomizeData').click(function() {
        $.each(configPoll.data.datasets, function(i, piece) {
            $.each(piece.data, function(j, value) {
                /*
                * Le prossime due funzioni aggiornano i dati, ora in maniera random da
                * sistemare come preferiamo. Cambia anche il colore....boh...
                */
                configPoll.data.datasets[i].data[j] = randomScalingFactor();
                configPoll.data.datasets[i].backgroundColor[j] = randomColor();
            });
        });
        window.myPolarAreaA.update();
    });