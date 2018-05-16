$(document).ready(function () {

    predictions();

    $("#play-all").click(function () {
        $.get("/play-all", function () {
            refreshFixture();
            refreshLeauge();
            $('#weekly').data('week-id', 1);
            $('#weekly').attr('real', 1);
            getNextMatches();
            predictions();
        });
    });
    $("#reset").click(function () {
        $.get("api/reset", function () {
            refreshFixture();
            refreshLeauge();
            $('#weekly').data('week-id', 1);
            $('#weekly').attr('real', 1);
            getNextMatches();
            predictions();
        });
    });

    $("#see-next-week").click(function () {
        getNextMatches();
    });

    $("#play-weekly").click(function () {
        playWeekly();
        refreshFixture();
        refreshLeauge();
        predictions();
    });

    function refreshFixture() {
        $.getJSON("/api/fixture", function (data) {
            var showData = $('#table-body');

            showData.empty();
            showData.hide();
            $.each(data.weeks, function (i, week) {
                var html = "";
                html += "<tr><td colspan='3'>" + week.name + " Matches</td></tr>";
                $.each(data.items[week.id], function (i, item) {
                    html += "<tr>";
                    html += "<td><img src='http://localhost:8000/images/"+ item.home_logo + "' width='30' height='30' /> " + item.home_team + "</td>";
                    html += "<td>" + item.home_goal + " - ";
                    html += item.away_goal + "</td>";
                    html += "<td><img src='http://localhost:8000/images/"+ item.away_logo + "' width='30' height='30' /> " + item.away_team + "</td>";
                    html += "</tr>";

                });
                showData.append(html);
            });

            showData.show('slow');
        });
    }

    function refreshLeauge() {
        $.getJSON("/api/leauge", function (data) {
            var showData = $('#leauge-table-body');
            showData.empty();
            showData.hide();
            $.each(data, function (i, item) {
                var html = "";
                html += "<tr>";
                html += "<td><img width='50' height='50' src='http://127.0.0.1:8000/images/" + item.logo + "' /> " + item.name + "</td>";
                html += "<td>" + item.points + "</td>";
                html += "<td>" + item.played + "</td>";
                html += "<td>" + item.won + "</td>";
                html += "<td>" + item.draw + "</td>";
                html += "<td>" + item.lose + "</td>";
                html += "<td>" + item.goal_drawn + "</td>";
                html += "</tr>";
                showData.append(html);
            });
            showData.show('slow');

        });
    }

    function getNextMatches() {
        var weekID = $('table#weekly').data('week-id');
        $.getJSON("/api/next-matches/" + weekID, function (data) {
            var showData = $('#weekly-matches');
            showData.empty();
            showData.hide();
            $.each(data.matches, function (i, item) {
                var html = "";
                if (i == 0) {
                    html += "<tr>"
                        + '<td colspan="3">' + item.name + ' Matches</td>'
                        + '</tr>';
                }
                html += '<tr>'
                    + '<td><img width="30" height="30" src="http://localhost:8000/images/' + item.home_logo + '" /> ' + item.home_team + '</td>'
                    + '<td>' + item.home_goal + ' - ' + item.away_goal + '</td>'
                    + '<td><img width="30" height="30" src="http://localhost:8000/images/' + item.away_logo + '"/> ' + item.away_team + '</td>'
                    + '</tr>'
                showData.append(html);
                if (item.played == 1)
                    $('#play-weekly').hide();
                else
                    $('#play-weekly').show();
            });
            showData.show('slow');
            if (weekID + 1 == 7) {
                $('#see-next-week').hide();
            }
        });
        $('#weekly').data('week-id', (weekID + 1));
        $('#weekly').attr('real', (parseInt($('#weekly').attr('real')) + 1))
    }

    function playWeekly() {
        var weekId = $('#weekly').attr('real');

        $.getJSON("/api/play-weekly/" + weekId, function (data) {
            var showData = $('#weekly-matches');
            showData.empty();
            showData.hide();

            $.each(data.matches, function (i, item) {

                var html = "";
                if (i == 0) {
                    html += "<tr>"
                        + '<td colspan="3">' + item.name + ' Matches</td>'
                        + '</tr>';
                }
                html += '<tr>'
                    + '<td>' + item.home_team + '</td>'
                    + '<td>' + item.home_goal + ' - ' + item.away_goal + '</td>'
                    + '<td>' + item.away_team + '</td>'
                    + '</tr>'
                showData.append(html);

                if (item.played == 1)
                    $('#play-weekly').hide();
            });
            showData.show('slow');

        });
    }
    function predictions(){
        $.get("/api/predictions", function (data) {
            createChart(data);
        });
    }
    function createChart(data) {
        Highcharts.chart('chart', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            credits: {
                enabled: false
            },
            title: {
                text: 'Predictions'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Teams',
                data: data.items
            }]
        });
    }
});