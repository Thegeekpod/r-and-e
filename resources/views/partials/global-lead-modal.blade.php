{{-- Global Quick Consultation Popup Modal --}}
@php
    $isPopupEnabled = \App\Models\SiteSetting::get('quick_lead_popup_enabled', '1') === '1';
    $popupTitle     = \App\Models\SiteSetting::get('quick_lead_popup_title', 'Get Free Expert Consultation');
    $popupSubtitle  = \App\Models\SiteSetting::get('quick_lead_popup_subtitle', 'Have questions about finance, taxation, admissions, or placements? Talk with our specialists.');
    $popupDelay     = (int) \App\Models\SiteSetting::get('quick_lead_popup_delay', '5');
    $popupBadge     = \App\Models\SiteSetting::get('quick_lead_popup_badge', 'Instant Support');
    
    // Determine friendly page name
    $pageName = match(true) {
        request()->routeIs('home') => 'Home Page',
        request()->routeIs('finance') => 'Finance & Taxation Page',
        request()->routeIs('education') => 'Education Consultancy Page',
        request()->routeIs('placement') => 'Job Placement Page',
        request()->routeIs('about') => 'About Us Page',
        request()->routeIs('contact') => 'Contact Us Page',
        request()->routeIs('blog.*') => 'Blog & Articles',
        request()->routeIs('jobs.*') => 'Job Portal',
        default => ucwords(trim(request()->path(), '/')) ?: 'Website Page',
    };

    // Exclude Contact Us and Blog pages
    $isExcludedPage = request()->routeIs('contact') || request()->routeIs('blog.*');
@endphp

@if($isPopupEnabled && !$isExcludedPage)
<div class="global-lead-modal-backdrop" id="globalLeadModal" aria-hidden="true" role="dialog" aria-labelledby="globalLeadModalTitle">
    <div class="global-lead-modal-container">
        <!-- Close Button -->
        <button type="button" class="global-lead-modal-close" id="closeGlobalLeadModal" aria-label="Close">&times;</button>

        <div class="global-lead-modal-header">
            <span class="global-lead-modal-badge">
                <i class="fa-solid fa-bolt me-1"></i> {{ $popupBadge }}
            </span>
            <h3 class="global-lead-modal-title" id="globalLeadModalTitle">{{ $popupTitle }}</h3>
            <p class="global-lead-modal-subtitle">{{ $popupSubtitle }}</p>
        </div>

        <div class="global-lead-modal-body">
            <!-- Alert Message Container -->
            <div id="globalLeadAlert" class="global-lead-alert" style="display: none;"></div>

            <form id="globalLeadForm" action="{{ route('quick-lead.submit') }}" method="POST">
                @csrf
                <input type="hidden" name="source_url" id="globalLeadSourceUrl" value="{{ url()->current() }}">
                <input type="hidden" name="source_page" id="globalLeadSourcePage" value="{{ $pageName }}">

                <div class="global-lead-row">
                    <div class="global-lead-group">
                        <label class="global-lead-label" for="leadName">Your Name <span class="text-danger">*</span></label>
                        <div class="global-lead-input-wrap">
                            <i class="fa-regular fa-user"></i>
                            <input type="text" id="leadName" name="name" class="global-lead-input" placeholder="e.g. John Doe" required>
                        </div>
                    </div>

                    <div class="global-lead-group">
                        <label class="global-lead-label" for="leadPhone">Phone Number <span class="text-danger">*</span></label>
                        <div class="global-lead-input-wrap">
                            <i class="fa-solid fa-phone"></i>
                            <input type="tel" id="leadPhone" name="phone" class="global-lead-input" placeholder="e.g. +91 98765 43210" required>
                        </div>
                    </div>
                </div>

                <div class="global-lead-row">
                    <div class="global-lead-group">
                        <label class="global-lead-label" for="leadEmail">Email Address <span class="text-danger">*</span></label>
                        <div class="global-lead-input-wrap">
                            <i class="fa-regular fa-envelope"></i>
                            <input type="email" id="leadEmail" name="email" class="global-lead-input" placeholder="e.g. john@example.com" required>
                        </div>
                    </div>

                    <div class="global-lead-group">
                        <label class="global-lead-label" for="leadService">Service Required</label>
                        <div class="global-lead-input-wrap select-wrap">
                            <i class="fa-solid fa-sliders"></i>
                            <select id="leadService" name="service" class="global-lead-input">
                                <option value="Finance & Taxation">Finance & Taxation (GST, ITR, Audit)</option>
                                <option value="Education Consultancy">Education & College Admissions</option>
                                <option value="Job Placement">Placement & Career Services</option>
                                <option value="EDGE Accounting Network">EDGE Accounting Network</option>
                                <option value="General Consultation" selected>General Consultation</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="global-lead-group mb-4">
                    <label class="global-lead-label" for="leadMessage">How can we help you? <small class="text-muted fw-normal">(Optional)</small></label>
                    <textarea id="leadMessage" name="message" class="global-lead-textarea" rows="2" placeholder="Briefly describe your requirements or inquiry..."></textarea>
                </div>

                <button type="submit" class="global-lead-btn-submit" id="globalLeadSubmitBtn">
                    <span class="btn-text"><i class="fa-solid fa-paper-plane me-2"></i> Request Call Back</span>
                    <span class="btn-loading" style="display: none;"><i class="fa-solid fa-circle-notch fa-spin me-2"></i> Submitting...</span>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
/* Global Lead Modal Backdrop */
.global-lead-modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(10, 26, 22, 0.75);
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.35s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.35s ease;
    padding: 20px;
    box-sizing: border-box;
}

.global-lead-modal-backdrop.is-visible {
    opacity: 1;
    visibility: visible;
}

/* Modal Container */
.global-lead-modal-container {
    background: #ffffff;
    width: 100%;
    max-width: 560px;
    border-radius: 24px;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35), 0 0 0 1px rgba(255, 255, 255, 0.2);
    position: relative;
    overflow: hidden;
    transform: translateY(30px) scale(0.95);
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
}

.global-lead-modal-backdrop.is-visible .global-lead-modal-container {
    transform: translateY(0) scale(1);
}

/* Close Button */
.global-lead-modal-close {
    position: absolute;
    top: 18px;
    right: 20px;
    width: 38px;
    height: 38px;
    background: rgba(0, 0, 0, 0.05);
    border: solid 1px #fff;
    border-radius: 50%;
    font-size: 24px;
    line-height: 1;
    color: #fff;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    z-index: 10;
}

.global-lead-modal-close:hover {
    background: #03594A;
    color: #ffffff;
    transform: rotate(90deg);
}

/* Modal Header */
.global-lead-modal-header {
    background: linear-gradient(135deg, #03594A 0%, #063A31 100%);
    padding: 32px 36px 26px;
    color: #ffffff;
    position: relative;
}

.global-lead-modal-header::after {
    content: '';
    position: absolute;
    bottom: -1px;
    left: 0;
    right: 0;
    height: 12px;
    background: #ffffff;
    border-radius: 12px 12px 0 0;
}

.global-lead-modal-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(199, 245, 44, 0.18);
    color: #C7F52C;
    border: 1px solid rgba(199, 245, 44, 0.4);
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    padding: 4px 12px;
    border-radius: 50px;
    margin-bottom: 12px;
}

.global-lead-modal-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: #ffffff;
    margin: 0 0 6px 0;
    line-height: 1.25;
    font-family: inherit;
}

.global-lead-modal-subtitle {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.82);
    margin: 0;
    line-height: 1.45;
}

/* Modal Body */
.global-lead-modal-body {
    padding: 24px 36px 34px;
}

.global-lead-alert {
    padding: 12px 16px;
    border-radius: 12px;
    font-size: 0.9rem;
    margin-bottom: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.global-lead-alert.alert-success-custom {
    background: #DCFCE7;
    color: #166534;
    border: 1px solid #86EFAC;
}

.global-lead-alert.alert-error-custom {
    background: #FEE2E2;
    color: #991B1B;
    border: 1px solid #FCA5A5;
}

.global-lead-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 14px;
}

@media (max-width: 520px) {
    .global-lead-row {
        grid-template-columns: 1fr;
        gap: 12px;
        margin-bottom: 12px;
    }
    .global-lead-modal-header {
        padding: 26px 22px 20px;
    }
    .global-lead-modal-body {
        padding: 20px 22px 26px;
    }
}

.global-lead-group {
    display: flex;
    flex-direction: column;
}

.global-lead-label {
    font-size: 0.82rem;
    font-weight: 700;
    color: #334155;
    margin-bottom: 6px;
}

.global-lead-input-wrap {
    position: relative;
    display: flex;
    align-items: center;
}

.global-lead-input-wrap i {
    position: absolute;
    left: 14px;
    color: #94A3B8;
    font-size: 0.95rem;
    pointer-events: none;
    transition: color 0.2s;
}

.global-lead-input {
    width: 100%;
    padding: 11px 14px 11px 38px;
    border: 1.5px solid #E2E8F0;
    border-radius: 12px;
    font-size: 0.92rem;
    color: #1E293B;
    background: #F8FAFC;
    transition: all 0.2s ease;
    box-sizing: border-box;
    font-family: inherit;
}

.global-lead-input:focus,
.global-lead-textarea:focus {
    outline: none;
    border-color: #03594A;
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(3, 89, 74, 0.12);
}

.global-lead-input:focus + i {
    color: #03594A;
}

.global-lead-textarea {
    width: 100%;
    padding: 10px 14px;
    border: 1.5px solid #E2E8F0;
    border-radius: 12px;
    font-size: 0.92rem;
    color: #1E293B;
    background: #F8FAFC;
    transition: all 0.2s ease;
    box-sizing: border-box;
    resize: vertical;
    min-height: 65px;
    font-family: inherit;
    margin-bottom:20px;
}

.global-lead-btn-submit {
    width: 100%;
    padding: 14px;
    background: #03594A;
    color: #ffffff;
    border: none;
    border-radius: 14px;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 8px 20px rgba(3, 89, 74, 0.25);
    transition: all 0.25s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.global-lead-btn-submit:hover {
    background: #063A31;
    transform: translateY(-1px);
    box-shadow: 0 10px 24px rgba(3, 89, 74, 0.35);
}

.global-lead-btn-submit:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('globalLeadModal');
    if (!modal) return;

    const closeBtn = document.getElementById('closeGlobalLeadModal');
    const form = document.getElementById('globalLeadForm');
    const alertBox = document.getElementById('globalLeadAlert');
    const submitBtn = document.getElementById('globalLeadSubmitBtn');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoading = submitBtn.querySelector('.btn-loading');

    const delaySeconds = {{ $popupDelay }};

    function showPopup() {
        modal.classList.add('is-visible');
        modal.setAttribute('aria-hidden', 'false');
    }

    function closePopup() {
        modal.classList.remove('is-visible');
        modal.setAttribute('aria-hidden', 'true');
    }

    // Auto-trigger popup after configured seconds delay
    setTimeout(showPopup, delaySeconds * 1000);

    // Event listener for close button
    if (closeBtn) {
        closeBtn.addEventListener('click', closePopup);
    }

    // Close when clicking on backdrop outside modal container
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closePopup();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('is-visible')) {
            closePopup();
        }
    });

    // Form Submission via AJAX
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Set loading state
            submitBtn.disabled = true;
            btnText.style.display = 'none';
            btnLoading.style.display = 'inline-flex';
            alertBox.style.display = 'none';

            const formData = new FormData(form);

            fetch("{{ route('quick-lead.submit') }}", {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(async response => {
                const data = await response.json();
                if (!response.ok) {
                    throw new Error(data.message || 'Submission error');
                }
                return data;
            })
            .then(data => {
                alertBox.className = 'global-lead-alert alert-success-custom';
                alertBox.innerHTML = '<i class="fa-solid fa-circle-check fs-5"></i> <span>' + data.message + '</span>';
                alertBox.style.display = 'flex';
                form.reset();

                // Auto close after 3 seconds
                setTimeout(function() {
                    closePopup();
                }, 3000);
            })
            .catch(err => {
                alertBox.className = 'global-lead-alert alert-error-custom';
                alertBox.innerHTML = '<i class="fa-solid fa-circle-exclamation fs-5"></i> <span>' + (err.message || 'Unable to submit lead. Please try again.') + '</span>';
                alertBox.style.display = 'flex';
            })
            .finally(() => {
                submitBtn.disabled = false;
                btnText.style.display = 'inline-flex';
                btnLoading.style.display = 'none';
            });
        });
    }
});
</script>
@endif
