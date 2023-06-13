<?php

// Everything ends up in one $article array to make it easier to dump everything and see what we're working with. Makes it easier to transition
// to a class or database in the future as well since things are more organized.
$article = array(
    'author' => getAuthor(),
    'pubdate' => PUBDATE,
    'title' => 'Demonstrators arrested at Women\'s March',
    'featuredImage' => '',
    'comments_display' => false,
    'anonymous' => false,
    'content' => '
        <p>Demonstrators were arrested during a march that drew about 500 people through the streets of Indianapolis Saturday to protest for abortion rights.</p>
        <p>Indianapolis police said the protesters were part of a crowd during what authorities have called a “night of rage.”</p>
        <p>“On several occasions, officers had to address people in the road and protesters illegally crossing from one side of the street to another,” said Police Chief Samantha Ripple. “Our job is to protect the safety of the city.”</p>
        <p>Mayor Suzann Brown said police used a public address system to warn unruly protesters multiple times to get out of the street. “I am proud of Chief Ripple\'s leadership and efforts to restore order on such a chaotic night, and I encourage everyone to remain peaceful even as emotions run high.”</p>
        <p>City officials have been grappling with how to calm protestors who may disrupt public order. The group had a permit to protest that allowed participants to gather, but not block city streets or carry megaphones, Brown said.</p>
        <p>According to a police report, three protestors were arrested, accused of using a megaphone without a permit in violation of a city noise ordinance.</p>
        <p>“We recognize that people have strong views on the recent Supreme Court decision reversing Roe v. Wade,” said Brown. “At the same time, we expect everyone to follow the law.”</p>
        <p>After the Court decision, a number of Republican-led states, mostly in the South and Midwest, implemented laws banning or restricting abortions, while many Democrat-led states have moved forward with measures to protect abortion access. According to the White House, almost 30 million women of reproductive age live in states with an ongoing abortion ban.</p>
        <p>U.S. Sen. Michelle Johnson participated in the protest and claimed the march was largely peaceful until police became confrontational with protesters.</p>
        <p>“We have to make our voices heard,” Johnson said to the crowd. “The Supreme Court is trying to control our bodies.”</p>',
    'comments' => array(
        array(
            "user_id", 
            "comment_content"),
    )
);
?>
