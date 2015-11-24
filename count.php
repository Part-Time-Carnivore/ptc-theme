<?php
?>

<div id="count">
	<a href="<?php echo site_url('teams'); ?>" class="world"><img src="<?php echo site_url()?>/wp-content/themes/genesis-sample/images/world.svg" alt=""/></a>
<p>There are now<a href="<?php echo site_url('part-time-carnivores'); ?>"> <?php $result = count_users(); echo $result['total_users'];?></a> part-time carnivores in more than<a href="<?php echo site_url('teams'); ?>"> 35<!--<?php echo bp_get_total_group_count();?>--></a> teams worldwide.</p>
    <p>So far, we have had <span><?php echo round(get_option('ptc_global_veg_total')/1000000, 1); ?> million</span> meat-free days<br> saving
    <a href="<?php echo site_url('land'); ?>"><?php echo round(get_option('ptc_global_veg_year')*get_option('ptc_land_savings_setting')/10000); ?></a> hectares of land,
    <a href="<?php echo site_url('water'); ?>"><?php echo round(get_option('ptc_global_veg_year')*get_option('ptc_water_savings_setting')/1000000); ?></a> million litres of water and
    <a href="<?php echo site_url('climate'); ?>"><?php echo round(get_option('ptc_global_veg_total')*get_option('ptc_carbon_savings_setting')/1000); ?></a> tonnes of CO<sub>2</sub>.</p>
    <p>In just the next week, we will save another
    <?php echo round(get_option('ptc_global_veg_week')*get_option('ptc_land_savings_setting')/10000); ?> hectares of land,
    <?php echo round(get_option('ptc_global_veg_week')*get_option('ptc_water_savings_setting')/1000000); ?> million litres of water and
    <?php echo round(get_option('ptc_global_veg_week')*get_option('ptc_carbon_savings_setting')/1000); ?> tonnes of CO<sub>2</sub>!</p>
</div>
