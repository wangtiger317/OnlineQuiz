<!-- page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper settingPage">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Reviews</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">

                        <table class="table" id="reviewTable">
                            <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Content</th>
                            <th>Reviewed At</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            <?php $i = 1;?>
                            <?php foreach ($all_reviews as $review): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $review->name ?></td>
                                    <td><?php echo $review->email; ?></td>
                                    <td><?php echo $review->phone_number; ?></td>
                                    <td><?php echo $review->content; ?></td>
                                    <td><?php echo $review->created_at; ?></td>
                                    <td>
                                        <form action="<?php echo base_url();?>about/delete_review/<?php echo $review->id?>">
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
<!-- /.box -->
    </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#reviewTable').DataTable({})
    })
</script>