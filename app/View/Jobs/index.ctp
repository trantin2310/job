<?php //var_dump($jobs); ?>
<?php echo $this->Html->link("Add Job",array("controller"=>"jobs","action"=>"add")) ?>
<table>
    <tr>
        
        <th>Title</th>
        <th>Description</th>
        <th>Expires</th>
        <th>Action</th>
    </tr>
    <?php 
        if(isset($jobs) && count($jobs)>0){
            foreach($jobs as $job){
            ?>
            <tr>
                <td><?php echo $job["Job"]["title"] ?></td>
                <td><?php echo $job["Job"]["description"] ?></td>
                <td><?php echo $this->Time->format('F jS Y',$job["Job"]["expires"]);  ?></td>
                <td>
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $job["Job"]['id'])); ?>
        			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $job["Job"]['id'])); ?>
        			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $job["Job"]['id']), null, __('Are you sure you want to delete # %s?', $job["Job"]['id'])); ?>
                </td>
            </tr>
            <?php 
            }
        }else{?>
            <tr>
                <td colspan="3"><?php echo "Job is empty !";?></td>
            </tr>
        <?php 
        }
    ?>
</table>