<?php

// Everything ends up in one $article array to make it easier to dump everything and see what we're working with. Makes it easier to transition
// to a class or database in the future as well since things are more organized.
$article = array(
    'author' => getAuthor(),
    'pubdate' => PUBDATE,
    'title' => 'Key U.S. inflation measures surge',
    'featuredImage' => '',
    'comments_display' => false,
    'anonymous' => false,
    'content' => '
        <p>Inflation rose this month at its fastest pace this year, a sign that price pressures remain entrenched in the U.S. economy and could lead the Federal Reserve to continue raising interest rates.</p>
        <p>Friday\'s Commerce Department report showed that consumer prices rose 0.6%, up sharply from an earlier 0.2% increase last month. Prices have risen 5.4% year over year.</p>
        <p>What experts call core inflation, which excludes volatile food and energy prices, rose 0.6% last month, up from a 0.4% rise the preceding month. And compared with a year earlier, core inflation was up 4.7%, versus a 4.6% year-over-year uptick the previous month.</p>
        <p>The report also showed that consumer spending rose 1.8% this month after a brief decline.</p>
        <p>The price data in the report fell short of forecasters\' expectations, confounding hopes that inflation was steadily decelerating and that the Fed could end its campaign of interest rate hikes. The economy remains gripped by inflation despite the Fed\'s efforts to tame it.</p>
        <p>Members of the Fed\'s rate-setting committee believe slightly higher rates may be necessary to restore price stability. On average, policymakers anticipate rates climbing by another quarter-percentage point by the end of this year, according to new projections that were also released this week.</p>
        <p>Last week, the government issued a separate inflation measure — the consumer price index — that showed that prices surged 0.5% last month, much more than the previous month\'s 0.1% rise.</p>
        <p>Since last year, the Fed has attacked inflation by raising its key interest rates repeatedly. Yet despite the resulting higher borrowing costs for individuals and businesses, the job market remains surprisingly robust. That is a worrisome sign for the Fed because strong demand for workers tends to fuel wage growth and overall inflation. Employers added 517,000 jobs this month, and the unemployment rate fell to 3.4%, its lowest point since 1969.</p>',
    'comments' => array(
        array(
            "user_id", 
            "comment_content"),
    )
);
?>
