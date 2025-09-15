<?php
/* Display Contact Pop */
$contact_info = durel_get_contact_info();

// Only show floating buttons if enabled
if ($contact_info['show_floating_buttons']):
?>
<div class="contact-pop-up floating-buttons">
    <?php if (!empty($contact_info['phone'])): ?>
        <a href="tel:<?php echo esc_attr($contact_info['phone']); ?>" 
            class="floating-btn floating-btn-phone" 
            title="<?php _e('Call Now', 'durel') ?>">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>
        </a>
    <?php endif; ?>
    
    <?php if (!empty($contact_info['new_connection_link'])): ?>
        <a href="<?php echo esc_url(home_url($contact_info['new_connection_link'])); ?>" 
            class="floating-btn floating-btn-connection" 
            title="<?php _e('New Connection', 'durel') ?>">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-plus-icon lucide-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
        </a>
    <?php endif; ?>
    
    <?php if (!empty($contact_info['client_login_link'])): ?>
        <a target="_blank" 
            href="<?php echo esc_url($contact_info['client_login_link']); ?>" 
            class="floating-btn floating-btn-login" 
            title="<?php _e('Client Login', 'durel') ?>">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-in-icon lucide-log-in"><path d="m10 17 5-5-5-5"/><path d="M15 12H3"/><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/></svg>
        </a>
    <?php endif; ?>
</div>
<?php endif; ?>