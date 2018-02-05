<div class="row">
    <div class="col-xs-12 col-md-4">
        
    </div>
    <div class="col-xs-12 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>
                    detail profil 
                    <?php echo (isset($detail['username']))? $detail['username'] : '';?>
                </h4>
            </div>
            <div class="panel-body">
            <?php if(isset($detail['first_name']) && isset($detail['last_name'])) : ?>
                <div class="form-group">
                    <label>Nama Lengkap</label><br/>
                    <?php echo $detail['first_name'].' '.$detail['last_name'];?>
                </div>
            <?php endif; ?>
            <?php if(isset($detail['email'])) : ?>
                <div class="form-group">
                    <label>Email</label><br/>
                    <?php echo $detail['email'];?>
                </div>
            <?php endif; ?>
            <?php if(isset($detail['phone'])) : ?>
                <div class="form-group">
                    <label>No. Telp</label><br/>
                    <?php echo $detail['phone'];?>
                </div>
            <?php endif; ?>

            </div>
            <div class="panel-footer">
                <div class="text-right">
                    
                </div>
            </div>
        </div>

    </div>
</div>