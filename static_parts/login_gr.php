<div class="tab-pane fade" id="login">
    <div class="row-fluid">
        <div class="span6" id="login">
            <form class="form-horizontal span2 offset4">
                <fieldset>
                    <legend class="text-center">Συνδεθείτε</legend>
                    <div class="control-group">
                        <label class="control-label">Όνομα χρήστη:</label>
                        <div class="controls">
                            <input type="text" pattern="[\d|a-z|A-Z]{5}[\d|a-z|A-Z]{1,7}" title="6-12 αλφαριθμητικά" class="input-medium" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Κωδικός χρήστη:</label>
                        <div class="controls">
                            <input type="password" pattern="[^\']{6,18}" title="6-18 χαρακτήρες" class="input-medium" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-primary">Είσοδος</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="span6" id="register">
            <form class="form-horizontal span2">
                <fieldset>
                    <legend class="text-center">Εγγραφείτε</legend>
                    <div class="control-group">
                        <label class="control-label">Όνομα χρήστη:</label>
                        <div class="controls">
                            <input type="text" class="input-medium" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Κωδικός χρήστη:</label>
                        <div class="controls">
                            <input type="password" class="input-medium" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Επανάληψη κωδικού:</label>
                        <div class="controls">
                            <input type="password" class="input-medium" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Φύλο/Ηλικία:</label>
                        <div class="controls">
                            <select class="span5">
                                <option selected>Άρρεν</option>
                                <option>Θήλυ</option>
                                <option>Άλλο</option>
                            </select>
                            <input class="span4" type="number" min="12" max="111" step="1" value="18" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Χώρα/Πόλη:</label>
                        <div class="controls">
                            <input type="text" class="input-small" required>
                            <input type="text" class="input-small" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Ηλεκτρονική διεύθυνση:</label>
                        <div class="controls">
                            <input type="email" class="input-large" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-primary">Εγγραφή</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>