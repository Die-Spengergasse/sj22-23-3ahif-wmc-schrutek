<div class="row">
    <div class="col">
        <h3>Offer List:</h3>
        <p>
            Info zur Offers...
        </p>
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
        <?php

        if (isset($GLOBALS['result']))
        {
            echo <<<HTML
            <ul>
            HTML;
            foreach ($GLOBALS['result'] as $offer)
            {
                echo('<li><a href="#" onclick=getPriceTrends(\'' . $offer->id . '\');>' . $offer->productean . '</a></li>');
            }
            echo <<<HTML
            </ul>
            </div>
            <div class="col position-relative">
            HTML;

            echo <<<HTML

            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>GUID</th>
                    <th>Price</th>
                    <th>Date</th>
                </thead>
                <tbody  id="trendsContainer" />
            </table>
            HTML;
        }

echo <<<HTML
    </div>
</div>
HTML;
        
?>