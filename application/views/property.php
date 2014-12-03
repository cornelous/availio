<table>
    <tr>
        <th>Avail Id</th>
        <th>External Id</th>
        <th>Property Name</th>
        <th>Property Type</th>
        <th>Bedrooms</th>
        <th>Sleeps</th>
        <th>Province</th>
        <th>City</th>
        <th>Suburb</th>
        <th>URL</th>
    </tr>
    <?php $count = 0;?>
    <?php foreach ($properties as $property) : ?>
    <?php if ($count %2 == 0): ?>
    <tr>
        <td><?php echo $property['availid']; ?></td>
        <td><?php echo $property['externalid']; ?></td>
        <td><?php echo $property['propertyname']; ?></td>
        <td><?php echo $property['propertytype']; ?></td>
        <td><?php echo $property['bedrooms']; ?></td>
        <td><?php echo $property['sleeps']; ?></td>
        <td><?php echo $property['province']; ?></td>
        <td><?php echo $property['city']; ?></td>
        <td><?php echo $property['suburb'] ?></td>
        <td><?php echo $property['url'] ?></td>
    </tr>
    <?php else: ?>
        <tr class = "alt">
            <td><?php echo $property['availid']; ?></td>
            <td><?php echo $property['externalid']; ?></td>
            <td><?php echo $property['propertyname']; ?></td>
            <td><?php echo $property['propertytype']; ?></td>
            <td><?php echo $property['bedrooms']; ?></td>
            <td><?php echo $property['sleeps']; ?></td>
            <td><?php echo $property['province']; ?></td>
            <td><?php echo $property['city']; ?></td>
            <td><?php echo $property['suburb'] ?></td>
            <td><?php echo $property['url'] ?></td>
        </tr>
     <?php endif; ?>
    <?php $count++;?>
    <?php endforeach; ?>
</table>
<br>
<div class="pagination">
    <?php echo $pager_links; ?>
</div>
<br>

<?php echo HTML::anchor('addproperty', 'Add Property', array('class'=>'property'));?>

