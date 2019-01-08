

<!-- BODY -->
<form action="<?php echo base_url(); ?>AccountController/ValidateProfile_Info" method="post">
  <row>
    <section id="indulge" class="container fullpage-bg">
      <div class="text-center level-select demog-box" id="ni">
        <h3 id="level-title">Demographic Profile</h3>
        <br/>
        <div class="register">
          <div id="comp-skills">
            <h4>First Name</h4>
            <input type="text" class="textbox" placeholder="First Name" name="firstname" required>
            <h4>Last Name</h4>
            <input type="text" class="textbox" placeholder="Last Name" name="lastname" required>
            <h4>Gender</h4>
            <select class="textbox" id="year" name="gender" placeholder="Year/Level">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
            <h4>Program</h4>
            <select class="textbox" id="program" name="program" placeholder="Program">
              <optgroup label="Mapua-PTC College of Maritime Education and Training">
                <option value="Marine Engineering">Marine Engineering</option>
                <option value="Marine Transportation">Marine Transportation</option>
              </optgroup>
              <optgroup label="College of Arts and Science">
                <option value="Multimedia Arts">Multimedia Arts</option>
                <option value="Communication">Communication</option>
                <option>Environmental Science</option>
              </optgroup>
              <optgroup label="Mapua Institute of Technology at Laguna">
                <option value="Architecture">Architecture</option>
                <option value="Chemical Engineering">Chemical Engineering</option>
                <option value="Civil Engineering">Civil Engineering</option>
                <option value="Computer Engineering">Computer Engineering</option>
                <option value="Electrical Engineering">Electrical Engineering</option>
                <option value="Electronics Engineering">Electronics Engineering</option>
                <option value="Industrial Engineering">Industrial Engineering</option>
                <option value="Mechanical Engineering">Mechanical Engineering</option>
              </optgroup>
              <optgroup label="E.T. Yuchengco College of Business">
                <option value="Accountancy">Accountancy</option>
                <option value="Hotel and Restaurant Management">Hotel and Restaurant Management</option>
                <option value="Entrepreneurship">Entrepreneurship</option>
                <option value="Tourism Management">Tourism Management</option>
                <option value="Accounting Information Systems">Accounting Information Systems</option>
              </optgroup>
              <optgroup label="College of Computer and Information Science">
                <option value="Information Technology">Information Technology</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Information Systems">Information Systems</option>
              </optgroup>
            </select>
            <h4>Year Level</h4>
            <select class="textbox" id="year" name="year" placeholder="Year/Level">
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            <h4>Enable Companion?</h4>
            <select class="textbox" id="year" name="agent" placeholder="Companion Check">
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
            <button id="btn-level-select">Submit</button>
            <br/>
          </div>
        </div>
      </div>
    </section>
  </row>
</form>
        <!-- BODY END -->