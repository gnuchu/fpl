<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
    
  </head>

<body>
  <script>
    $(document).ready( function () {
      $('#player_info').DataTable({
        paging: false
      });
    });
  </script>
  
<?php

include "utils.php";

$json=file_get_contents("https://fantasy.premierleague.com/api/bootstrap-static/");
//suggested to use http://docs.guzzlephp.org/en/stable/ instead of file_get_contents

$data =  json_decode($json, true);
?>
    <div class='container-fluid'>
      <table class='table table-striped table-bordered table-hover table-sm table-responsive' id ="player_info">
        <thead class="thead-dark">
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
      </thead>
      <tbody>

        <?PHP
        foreach($data['elements'] as $key=>$item)
        {
            ?>
            <tr>
                <td><?PHP echo $item['id']; ?></td>
                <td><?PHP echo $item['web_name']; ?></td>
                <td><?PHP echo $item['code']; ?></td>
                <td><?PHP echo $item['first_name']; ?> <?PHP echo $item['second_name']; ?></td>

                <td><?PHP echo $teams[$item['team_code']]; ?></td>

                <td><?PHP echo $item['news']; ?></td>

                <td><?PHP echo $position[$item['element_type']]; ?></td>

                <td><?PHP echo $item['now_cost']/10; ?></td>
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
      </tbody>
    </table>
  </div>
</body>
</html>