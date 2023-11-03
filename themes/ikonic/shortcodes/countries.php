<?php
$api_url = 'https://restcountries.com/v3.1/all?fields=name,flags';
$json_data = file_get_contents($api_url);
$response_data = json_decode($json_data);
?>
<style>
    .countries {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .country-list {
        flex: 0 0 20%;
        max-width: 20%;
        margin-bottom: 20px;
    }

    span.country-flag {
        display: inline-block;
        width: 100px;
    }

    span.country-flag img {
        width: 100%;
        border: 1px solid #0000000d;
    }

    span.country-name {
        margin-left: 15px;
    }
</style>
<?php
echo "<div class='countries'>";
foreach ($response_data as $key => $value) { ?>
    <div class="country-list">
        <span class="country-flag">
            <img src="<?php echo (isset($value->flags->png) ? $value->flags->png : ''); ?>" alt="<?php echo (isset($value->name->common) ? $value->name->common : ''); ?>">
        </span>
        <span class="country-name"><?php echo (isset($value->name->common) ? $value->name->common : ''); ?></span>
    </div>
<?php }
echo "</div>";
