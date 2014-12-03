<table>
    <tr>
        <th>Username</th>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Country</th>
        <th>Email</th>
        <th>Phonenumber</th>
        <th>Password</th>
        <th>Active</th>
        <th>Verified</th>
        <th>Actions</th>
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
        <td>
        </td>
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
            <td>
            </td>
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

