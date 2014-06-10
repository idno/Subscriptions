<div class="control-group">
    <label class="control-label" for="subscriptions">Subscribe to new content by email?</label>
    <div class="controls">
        <select name="notifications[subscriptions]" id="subscriptions" class="span4">
            <option value="all" <?php if ($user->notifications[subscriptions] == 'all') { echo 'selected'; } ?>>Yes! Send me new content by email</option>
            <option value="none" <?php if ($user->notifications[subscriptions] == 'none') { echo 'selected'; } ?>>Please don't email me about new content</option>
        </select>
    </div>
</div>