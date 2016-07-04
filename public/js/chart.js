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
                    "#D9534F",
                    "#F0AD4E",
                    "#5BC0DE",
                    "#337AB7",
                    "#5CB85C",
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
                text: 'Dati Generali Corso'
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
					"#D9534F",
					"#F0AD4E",
					"#5BC0DE",
					"#337AB7",
					"#5CB85C",
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
                text: 'Dati Generali Sondaggio'
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


//LINK ALLA TABELLA SONDAGGI
$(function(){
	
//	$totalData = $('#totalData').val();
//	configCourse.data.datasets[0].data = JSON.parse($totalData);
//	window.myPolarArea.update();


	//Torta del sondaggio
	$('.pollData').on('click', function(){

		$pollID = $(this).attr("poll");
        $total = $('#'+$pollID+"-total").val();

		$('#lesson-chart-title').html($(this).html());

		$.each(configPoll.data.datasets, function(a, piece) {
			$.each(piece.data, function(b, value) {
				$value = $('#'+$pollID+'-vote-'+(b+1)+'-star').val();
				configPoll.data.datasets[a].data[b] = Math.round(($value * 100) /$total);
			});
		});
	});

	$('#first').trigger('click');
});
