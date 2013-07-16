<div class="modal hide fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form class="form-horizontal" method="POST" action="">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Εγγραφείτε</h3>
        </div>
        <div class="modal-body">
            <fieldset>
                <div class="control-group">
                    <label class="control-label">Ηλεκτρονική διεύθυνση:</label>
                    <div class="controls">
                        <input type="email" name="register" pattern="[^\']*" class="input-large" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Κωδικός χρήστη:</label>
                    <div class="controls">
                        <input type="password" id="password" pattern="[^\']*" name="pass" class="input-medium" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Επανάληψη κωδικού:</label>
                    <div class="controls">
                        <input type="password" pattern="[^\']*" class="input-medium" oninput="check(this)" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Φύλο/Ηλικία:</label>
                    <div class="controls">
                        <select class="span5" name="gender">
                            <option selected>Άρρεν</option>
                            <option>Θήλυ</option>
                            <option>Άλλο</option>
                        </select>
                        <input class="span4" name="age" type="number" min="12" max="111" step="1" value="18" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Χώρα/Πόλη:</label>
                    <div class="controls">
                        <input type="text" pattern="[^\']*" name="country" class="input-small" required>
                        <input type="text" name="city" pattern="[^\']*" class="input-small" required>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Άκυρο</button>
            <button type="submit" class="btn btn-primary">Εγγραφή!</button>
        </div>
    </form>
</div>