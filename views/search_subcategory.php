<?php foreach($subs as $sub): ?>
<option value="<?= $sub['id']; ?>">
    <?php 
        for ($i = 0; $i < $level; $i++) echo '-- ';
        echo $sub['name'];
    ?>
</option>
<?php 
    if (!empty($sub['subs']) && count($sub['subs']) > 0) {
        $this->loadView('search_subcategory', array(
            'subs' => $sub['subs'],
            'level' => $level + 1
        ));
    }
?>

<?php endforeach; ?>