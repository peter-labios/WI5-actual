
<meta http-equiv="refresh" content="3; url=<?= base_url();?>GameController/BackToPage/<?= $Page[0]?>">
<audio autoplay hidden>
    <source src="<?= base_url();?>sound/wrong.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>

    <section>
        <div id="ni">
            <div id="vrus">
                <img src="<?= base_url();?>img/v.png" width="120" height="100">
            </div>

            <!-- For Nick -->
            <?php if($this->session->userdata('Avatar') == 'boy'){?>
            <?php if ($this->session->has_userdata('Infected 3')) { ?>
            <div id="i1" class="animated slideInUp">
                <img src="<?= base_url();?>img/i4.png" width="397" height="883">
            </div>

            <div id="i2">
                <img src="<?= base_url();?>img/i5.png" width="397" height="883">
            </div>

            <?php } elseif ($this->session->has_userdata('Infected 2')) { ?>
            <div id="i1" class="animated slideInUp">
                <img src="<?= base_url();?>img/i3.png" width="397" height="883">
            </div>

            <div id="i2">
                <img src="<?= base_url();?>img/i4.png" width="397" height="883">
            </div>

            <?php } elseif ($this->session->has_userdata('Infected 1')) { ?>
            <div id="i1" class="animated slideInUp">
                <img src="<?= base_url();?>img/i2.png" width="397" height="883">
            </div>
            <div id="i2">
                <img src="<?= base_url();?>img/i3.png" width="397" height="883">
            </div>


            <?php } elseif($this->session->has_userdata('Infected 0')){?>
            <div id="i1" class="animated slideInUp">
                <img src="<?= base_url();?>img/i1.png" width="397" height="883">
            </div>
            <div id="i2">
                <img src="<?= base_url();?>img/i2.png" width="397" height="883">
            </div>
            <?php } ?>
            <div id="n" class="animated slideInUp">
                <img src="<?= base_url();?>img/bb.png">
            </div>
            <!-- For jesse -->
            <?php } else { ?>
            <?php if ($this->session->has_userdata('Infected 3')) { ?>
            <div id="i1" class="animated slideInUp">
                <img src="<?= base_url();?>img/j_i4.png" width="397" height="883">
            </div>

            <div id="i2">
                <img src="<?= base_url();?>img/j_i5.png" width="397" height="883">
            </div>

            <?php } elseif ($this->session->has_userdata('Infected 2')) { ?>
            <div id="i1" class="animated slideInUp">
                <img src="<?= base_url();?>img/j_i3.png" width="397" height="883">
            </div>

            <div id="i2">
                <img src="<?= base_url();?>img/j_i4.png" width="397" height="883">
            </div>

            <?php } elseif ($this->session->has_userdata('Infected 1')) { ?>
            <div id="i1" class="animated slideInUp">
                <img src="<?= base_url();?>img/j_i2.png" width="397" height="883">
            </div>
            <div id="i2">
                <img src="<?= base_url();?>img/j_i3.png" width="397" height="883">
            </div>


            <?php } elseif($this->session->has_userdata('Infected 0')){?>
            <div id="i1" class="animated slideInUp">
                <img src="<?= base_url();?>img/j_i1.png" width="397" height="883">
            </div>
            <div id="i2">
                <img src="<?= base_url();?>img/j_i2.png" width="397" height="883">
            </div>
            <?php } ?>
            <div id="j_n" class="animated slideInUp">
                <img src="<?= base_url();?>img/j_bb.png" width="398">
            </div>
            <?php } ?>

            <div id="red">
                <img src="<?= base_url();?>img/m1.png" width="350" height="268">
            </div>
        </div>
    </section>