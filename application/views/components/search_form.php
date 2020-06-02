<form action="<?= site_url('home/search') ?>" method="GET">
    <div class="form-group">
        <div class="input-group my-2 bg-white rounded-theme-sm">
            <input type="text" class="form-control text-center border-0 bg-transparent" name="keyword" value="<?= (isset($_GET['keyword']) && !empty($_GET['keyword'])) ? $_GET['keyword'] : "" ?>" placeholder="Cari kota" required />
            <?php
                if (!empty($_GET['keyword'])) { ?>
                    <div class="input-group-append">
                        <a href="<?= site_url('home') ?>" class="input-group-text border-0 bg-transparent text-decoration-none" data-toggle="tooltip" data-placement="bottom" title="Hapus">❌</a>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</form>