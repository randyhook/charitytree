$(document).ready(function() {

	var clientAppCtx = document.getElementById("client-app-chart").getContext('2d');
	var clientAppChart = new Chart(clientAppCtx, {
		type: 'pie',
		data: {
			labels: ["Approved", "Pending"],
			datasets: [{
				label: '# of Votes',
				data: [40, 60],
				backgroundColor: [
					'rgba(0, 255, 0, 0.4)',
					'rgba(255, 0, 0, 0.4)'
				],
				borderColor: [
					'rgba(0, 255, 0, 0.2)',
					'rgba(255, 0, 0, 0.2)'
				],
				borderWidth: 0
			}]
		},
		options: {
			cutoutPercentage: 50,
			title: {
				display: true,
				position: 'bottom',
				text: 'Client Apps'
			}
		}
	});

	var donorAppCtx = document.getElementById("donor-app-chart").getContext('2d');
	var donorAppChart = new Chart(donorAppCtx, {
		type: 'pie',
		data: {
			labels: ["Approved", "Pending"],
			datasets: [{
				label: '# of Votes',
				data: [80, 20],
				backgroundColor: [
					'rgba(0, 255, 0, 0.4)',
					'rgba(255, 0, 0, 0.4)'
				],
				borderColor: [
					'rgba(0, 255, 0, 0.2)',
					'rgba(255, 0, 0, 0.2)'
				],
				borderWidth: 0
			}]
		},
		options: {
			cutoutPercentage: 50,
			title: {
				display: true,
				position: 'bottom',
				text: 'Donor Apps'
			}
		}
	});

});
