     <p>
            Choose Branch<br>(For Walk- In / Update Stocks):<br>



            <select name = 'branch_id' class= "form-control">

              <?php 

              $query_branches = $model->get_branch();

              while($result = mysqli_fetch_assoc($query_branches)) { ?>
              
                <option value = "<?php echo $result['branch_id']; ?>"><?php echo $result['branch_address']; ?></option>

               <?php } ?>


            </select>  </p>