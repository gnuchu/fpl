<!DOCTYPE html>
<html>
<head>

<style>
#player_info {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#player_info td, #player_info th {
    border: 1px solid #ddd;
    padding: 8px;
}

#player_info tr:nth-child(even){background-color: #f2f2f2;}

#player_info tr:hover {background-color: #ddd;}

#player_info th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #242424;
    color: white;
}
</style>

</head>
<body>
<button onclick="doCSV()"">Export HTML Table To CSV File</button>
<script>function doCSV() {
    var table = document.getElementById("player_info").innerHTML;
    var data = table.replace(/<thead>/g, '')
        .replace(/<\/thead>/g, '')
        .replace(/<tbody>/g, '')
        .replace(/<\/tbody>/g, '')
        .replace(/<tr>/g, '')
        .replace(/<\/tr>/g, '\r\n')
        .replace(/<th>/g, '')
        .replace(/<\/th>/g, ',')
        .replace(/<td>/g, '')
        .replace(/<\/td>/g, ',')
        .replace(/\t/g, '')
        .replace(/\n/g, '');
    var mylink = document.createElement('a');
    mylink.download = "fplinfo.csv";
    mylink.href = "data:application/csv," + escape(data);
    mylink.click();
}</script>
<?php
$json=file_get_contents("https://fantasy.premierleague.com/api/bootstrap-static/");
//suggested to use http://docs.guzzlephp.org/en/stable/ instead of file_get_contents

$data =  json_decode($json, true);
?>
<table id ="player_info">
<tr>
    <th>ID</th>
    <th>Web Name</th>
    <th>Player ID</th>
    <th>Full Name</th>
    <th>Team</th>
    <th>News</th>
    <th>Position</th>
    <th>Current Price</th>
    <th>Value Season</th>
    <th>Cost Change from Start</th>
    <th>Percentage selected by</th>
    <th>Transfers In</th>
    <th>Transfers Out</th>
    <th>Total Points</th>
    <th>Points Per Game</th>
    <th>Minutes</th>
    <th>Goals Scored</th>
    <th>Assists</th>
    <th>Clean Sheets</th>
    <th>Goals Conceded</th>
    <th>Own Goals</th>
    <th>Penalties Saved</th>
    <th>Penalties Missed</th>
    <th>Yellow Cards</th>
    <th>Red Cards</th>
    <th>Saves</th>
    <th>Bonus Points</th>
    <th>Bonus Point System Score</th>
    <th>Influence</th>
    <th>Creativity</th>
    <th>Threat</th>    
    <th>ICT Index</th>
    <th>EA Index</th>
</tr>

<?PHP
foreach($data['elements'] as $key=>$item)
{
    ?>
    <tr>
        <td><?PHP echo $item['id']; ?></td>
        <td><?PHP echo $item['web_name']; ?></td>
        <td><?PHP echo $item['code']; ?></td>
        <td><?PHP echo $item['first_name']; ?> <?PHP echo $item['second_name']; ?></td>
        <td><?PHP echo $item['team_code']; ?></td>
        <td><?PHP echo $item['news']; ?></td>
        <td><?PHP echo $item['element_type']; ?></td>
        <td><?PHP echo $item['now_cost']; ?></td>
        <td><?PHP echo $item['value_season']; ?></td>
        <td><?PHP echo $item['cost_change_start']; ?></td>
        <td><?PHP echo $item['selected_by_percent']; ?></td>
        <td><?PHP echo $item['transfers_in']; ?></td>
        <td><?PHP echo $item['transfers_out']; ?></td>
        <td><?PHP echo $item['total_points']; ?></td>
        <td><?PHP echo $item['points_per_game']; ?></td>
        <td><?PHP echo $item['minutes']; ?></td>
        <td><?PHP echo $item['goals_scored']; ?></td>
        <td><?PHP echo $item['assists']; ?></td>
        <td><?PHP echo $item['clean_sheets']; ?></td>
        <td><?PHP echo $item['goals_conceded']; ?></td>
        <td><?PHP echo $item['own_goals']; ?></td>
        <td><?PHP echo $item['penalties_saved']; ?></td>
        <td><?PHP echo $item['penalties_missed']; ?></td>
        <td><?PHP echo $item['yellow_cards']; ?></td>
        <td><?PHP echo $item['red_cards']; ?></td>
        <td><?PHP echo $item['saves']; ?></td>
        <td><?PHP echo $item['bonus']; ?></td>
        <td><?PHP echo $item['bps']; ?></td>
        <td><?PHP echo $item['influence']; ?></td>
        <td><?PHP echo $item['creativity']; ?></td>
        <td><?PHP echo $item['threat']; ?></td>
        <td><?PHP echo $item['ict_index']; ?></td>
        <td><?PHP echo $item['ea_index']; ?></td>
    </tr>
    <?PHP
}
?>
</table>