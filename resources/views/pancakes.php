<!DOCTYPE html>
<html>
<head>
    <title>Tasty recipes - pancakes</title>
    <link href="/resources/css/reset.css" rel="stylesheet" type="text/css">
    <link href="/resources/css/stylesheet.css" rel="stylesheet" type="text/css">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
</head>
<body>
   <?php 
       include 'resources/fragments/navbar.php'; 
   ?>
   <h1>Pancakes</h1>
   <div class="transbox">
    <img alt="image of pancakes" src="resources/images/pancakes.jpeg">
    <h2>Prep: 10 min | Total: 30 min | Servings: 4</h2>
    <h2>Ingredients</h2>
    <p>1 1/2 cups all-purpose flour<br>
    2 tablespoons sugar<br>
    1 tablespoon baking powder<br>
    3/4 teaspoon salt<br>
    1 1/4 cups milk<br>
    1 large egg<br>
    4 tablespoons butter, melted<br>
    1 teaspoon vanilla extract</p>
    <h2>Steps</h2>
    <p>1 In large bowl, whisk flour, sugar, baking powder and salt. Add milk,<br>butter and egg; stir until flour is moistened.<br>2 Heat 12-inch nonstick skillet or griddle over medium heat until drop of water sizzles; brush lightly with oil.<br>In batches, scoop batter by scant 1/4-cupfuls into skillet, spreading to 3 1/2 inches each.<br>Cook 2 to 3 minutes or until bubbly and edges are dry.<br>With wide spatula, turn; cook 2 minutes more or until golden. <br>Transfer to platter or keep warm on a cookie sheet in 225°F oven.<br>3 Repeat with remaining batter, brushing griddle with more oil if necessary.</p>
	
    <?php
        include 'resources/fragments/commentboxPC.php';
    ?>
    <h4>What others are saying...</h4>
    <hr>
    <div class="commentbox">

    <?php
        $commentData =  $contr->getComments('pancakes');
        $accessData = $contr->getTimestamps('pancakes');
        $j = 0;
        foreach ($commentData as $line) 
        {
            $text = explode(',', $line, 2)[1];
            if(strpos($text, $contr->getNickname()) !== false) 
            {
                echo $line;
                $timestamp = $accessData[$j];
                $j++;

                echo '
                    <form method = "POST" action="deleteComment.php">
                        <input type="submit" value="delete comment" name = "delete">
                        <input type="hidden" value="'.$timestamp.'" name="timestamp">
                        <input type="hidden" value="pancakes" name="commenttype">
                    </form>
                    ';                                                                         
            }

            else
               echo $line;
        }
    ?>      
    </div>
  </div>
</body>
</html> 