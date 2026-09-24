@extends('layouts.app')

@section('title', $settings['finance_meta_title'] ?? 'Finance & Taxation | Roy Infinity Edge Consulting')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&display=swap');

    .service-extra-point.is-hidden {
        display: none !important;
    }
    .service-extra-point {
        animation: servicePointFadeIn 0.35s ease forwards;
    }
    @keyframes servicePointFadeIn {
        from {
            opacity: 0;
            transform: translateY(-6px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .btn-learn-more-round.js-toggle-service-points {
        cursor: pointer;
        user-select: none;
    }
    .btn-learn-more-round .toggle-arrow-img {
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .btn-learn-more-round.is-expanded .toggle-arrow-img {
        transform: rotate(90deg);
    }

    /* ========================================================
       EDGE ACCOUNTS NETWORK SECTION STYLES (MODERN FINTECH)
       ======================================================== */
    .edge-network-section {
        padding: 60px 0 90px;
        position: relative;
    }

    .edge-network-outer {
        position: relative;
        border-radius: 36px;
        overflow: hidden;
        background: #FFFFFF;
        box-shadow: 0 20px 60px -15px rgba(3, 89, 74, 0.10);
        border: 1px solid #E2E8F0;
    }

    .edge-network-glass-overlay {
        background: linear-gradient(180deg, #FFFFFF 0%, #FBFDFB 45%, #F4F9F6 100%);
        padding: 60px 50px 40px;
        position: relative;
    }

    /* Header Bar */
    .edge-net-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        position: relative;
        margin-bottom: 35px;
    }

    .edge-net-side-tag {
        font-family: var(--font-plus-jakarta);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 2px;
        line-height: 1.45;
        color: #476358;
        text-transform: uppercase;
        max-width: 140px;
    }

    .edge-net-header-center {
        text-align: center;
        flex: 1;
        max-width: 820px;
        margin: 0 auto;
    }

    .edge-net-pill-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #E6F7F0;
        color: #03594A;
        font-family: var(--font-plus-jakarta);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 5px 16px;
        border-radius: 50px;
        border: 1px solid rgba(3, 89, 74, 0.16);
        margin-bottom: 12px;
    }

    .edge-net-pill-badge .pill-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #03594A;
        display: inline-block;
        animation: edgePulse 2s infinite ease-in-out;
    }

    @keyframes edgePulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.4); opacity: 0.5; }
    }

    .edge-net-brand-title {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-bottom: 8px;
    }

    .edge-net-brand-icon {
        display: inline-flex;
        flex-direction: column;
        justify-content: center;
        gap: 4px;
        width: 22px;
    }

    .edge-net-brand-icon .e-bar {
        height: 3.5px;
        background: #03594A;
        border-radius: 2px;
    }

    .edge-net-brand-icon .e-bar-mid {
        height: 3.5px;
        background: #03594A;
        border-radius: 2px;
        width: 75%;
    }

    .edge-net-bold-edge {
        font-family: var(--font-soliden), 'Plus Jakarta Sans', sans-serif;
        font-weight: 900;
        font-size: clamp(32px, 4.2vw, 46px);
        letter-spacing: -0.5px;
        color: #092e24;
        line-height: 1;
    }

    .edge-net-light-network {
        font-family: var(--font-soliden), 'Plus Jakarta Sans', sans-serif;
        font-weight: 500;
        font-size: clamp(32px, 4.2vw, 46px);
        color: #092e24;
        line-height: 1;
    }

    .edge-net-sub-title {
        font-family: var(--font-plus-jakarta);
        font-size: 14.5px;
        font-weight: 800;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #03594A;
        margin-bottom: 12px;
    }

    .edge-net-lead-desc {
        font-family: var(--font-plus-jakarta);
        font-size: 15.5px;
        line-height: 1.65;
        color: #475569;
        max-width: 720px;
        margin: 0 auto;
    }

    .edge-net-script-accent {
        font-family: 'Caveat', cursive;
        font-size: 34px;
        line-height: 1.15;
        color: #0b3d30;
        text-align: right;
        transform: rotate(-6deg);
        user-select: none;
        max-width: 140px;
        font-weight: 700;
    }

    /* Cards Wrapper */
    .edge-net-cards-wrapper {
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        align-items: stretch;
        gap: 0;
        margin-top: 10px;
        position: relative;
    }

    /* Shared Card Styles */
    .edge-net-card {
        border-radius: 28px;
        padding: 42px 38px 38px;
        display: flex;
        flex-direction: column;
        position: relative;
        z-index: 1;
        transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .edge-net-card:hover {
        transform: translateY(-6px);
    }

    .edge-card-top-icon {
        width: 60px;
        height: 60px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 22px;
        font-size: 24px;
        transition: transform 0.3s ease;
    }

    .edge-net-card:hover .edge-card-top-icon {
        transform: scale(1.08) rotate(3deg);
    }

    .edge-card-title {
        font-family: var(--font-soliden);
        font-size: 22px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
        line-height: 1.25;
    }

    .edge-card-subtitle {
        font-family: var(--font-plus-jakarta);
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 16px;
    }

    .edge-card-desc {
        font-family: var(--font-plus-jakarta);
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .edge-card-checklist {
        list-style: none;
        padding: 0;
        margin: 0 0 32px;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 13px;
    }

    .edge-card-checklist li {
        font-family: var(--font-plus-jakarta);
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 14px;
        line-height: 1.5;
    }

    .edge-card-checklist .edge-chk {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        flex-shrink: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        margin-top: 1px;
    }

    /* Left Card: Accounting Professionals (Luxury Emerald Dark) */
    .edge-card-pro {
        background: linear-gradient(150deg, #063d30 0%, #03251e 100%);
        color: #ffffff;
        box-shadow: 0 25px 60px -15px rgba(3, 45, 36, 0.45);
        border: 1px solid rgba(255, 255, 255, 0.14);
    }

    .edge-card-pro .edge-card-top-icon {
        background: rgba(255, 255, 255, 0.12);
        color: #B9FF66;
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .edge-card-pro .edge-card-title {
        color: #ffffff;
    }

    .edge-card-pro .edge-card-subtitle {
        color: #A7F3D0;
    }

    .edge-card-pro .edge-card-checklist li {
        color: #E2E8F0;
    }

    .edge-card-pro .edge-chk {
        background: rgba(185, 255, 102, 0.16);
        color: #B9FF66;
        border: 1.5px solid rgba(185, 255, 102, 0.6);
    }

    .edge-btn-pro {
        font-family: var(--font-soliden);
        background: #B9FF66;
        color: #042e23 !important;
        border: none;
        border-radius: 50px;
        padding: 15px 30px;
        font-size: 15.5px;
        font-weight: 700;
        letter-spacing: 0.3px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 10px 25px rgba(185, 255, 102, 0.35);
        text-decoration: none;
    }

    .edge-btn-pro:hover {
        background: #CEFFA3;
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(185, 255, 102, 0.55);
        color: #03241b !important;
    }

    /* Center Badge (Sleek Modern Connector) */
    .edge-net-center-badge {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 0 18px;
        z-index: 5;
        position: relative;
    }

    .edge-badge-txt {
        font-family: var(--font-plus-jakarta);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 2.2px;
        text-transform: uppercase;
        color: #03594A;
        text-align: center;
        line-height: 1.35;
        margin-bottom: 12px;
        white-space: nowrap;
    }

    .edge-badge-infinity {
        width: 82px;
        height: 82px;
        border-radius: 50%;
        background: #ffffff;
        box-shadow: 0 16px 36px rgba(3, 89, 74, 0.16);
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2.5px solid #E6F7F0;
        transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.35s ease;
    }

    .edge-net-center-badge:hover .edge-badge-infinity {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 20px 42px rgba(3, 89, 74, 0.25);
    }

    .edge-badge-infinity svg {
        width: 46px;
        height: 24px;
        color: #03594A;
    }

    /* Right Card: Businesses (Warm Ivory Luxury) */
    .edge-card-biz {
        background: linear-gradient(150deg, #FFFFFF 0%, #F9F7F2 100%);
        color: #1E293B;
        box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.08);
        border: 1.5px solid #E6DFD4;
    }

    .edge-card-biz .edge-card-top-icon {
        background: #F4ECE1;
        color: #4A3323;
        font-size: 24px;
        border: 1px solid #E5D9C8;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.04);
    }

    .edge-card-biz .edge-card-title {
        color: #0F172A;
    }

    .edge-card-biz .edge-card-subtitle {
        color: #475569;
    }

    .edge-card-biz .edge-card-desc {
        color: #475569;
    }

    .edge-card-biz .edge-card-checklist li {
        color: #334155;
    }

    .edge-card-biz .edge-chk {
        background: #EFE7DA;
        color: #4A3323;
        border: 1.5px solid #C4B59F;
    }

    .edge-btn-biz {
        font-family: var(--font-soliden);
        background: #2D2016;
        color: #ffffff !important;
        border: none;
        border-radius: 50px;
        padding: 15px 30px;
        font-size: 15.5px;
        font-weight: 700;
        letter-spacing: 0.3px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 10px 25px rgba(45, 32, 22, 0.3);
        text-decoration: none;
    }

    .edge-btn-biz:hover {
        background: #443021;
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(45, 32, 22, 0.45);
        color: #ffffff;
    }

    /* Values Bar */
    .edge-net-values-bar {
        background: #042E25;
        border-radius: 18px;
        padding: 16px 30px;
        margin-top: 35px;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 22px;
        color: #ffffff;
        box-shadow: 0 14px 35px rgba(3, 40, 32, 0.18);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .val-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-family: var(--font-plus-jakarta);
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 0.2px;
        color: #F8FAFC;
    }

    .val-icon {
        color: #B9FF66;
        font-size: 16px;
    }

    .val-sep {
        width: 1px;
        height: 22px;
        background: rgba(255, 255, 255, 0.2);
    }

    .val-tagline {
        font-family: var(--font-plus-jakarta);
        font-size: 13.5px;
        color: #A7F3D0;
        font-style: italic;
    }

    /* Footer Info Strip */
    .edge-net-footer-strip {
        margin-top: 30px;
        padding-top: 24px;
        border-top: 1px solid rgba(3, 89, 74, 0.15);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 18px;
        font-family: var(--font-plus-jakarta);
        font-size: 12.5px;
        line-height: 1.55;
        color: #475569;
    }

    .edge-foot-col {
        flex: 1;
        min-width: 180px;
    }

    .edge-foot-quote {
        max-width: 260px;
        color: #475569;
    }

    .edge-foot-tagline strong {
        color: #092e24;
    }

    .edge-foot-sep {
        width: 1px;
        height: 36px;
        background: rgba(3, 89, 74, 0.16);
    }

    .foot-edge-brand {
        font-family: var(--font-soliden);
        font-size: 14px;
        color: #092e24;
    }

    .foot-subhead {
        font-size: 10.5px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #64748B;
        display: block;
    }

    .foot-vriddhi-logo {
        height: 38px;
        width: auto;
        max-width: 180px;
        object-fit: contain;
        display: block;
        margin-top: 5px;
        transition: transform 0.25s ease;
    }

    .edge-foot-product:hover .foot-vriddhi-logo {
        transform: scale(1.05);
    }

    .pill-vriddhi-logo {
        height: 18px;
        width: auto;
        object-fit: contain;
        display: inline-block;
        vertical-align: middle;
        margin-right: 6px;
    }

    .foot-infinity {
        font-size: 26px;
        line-height: 1;
        color: #03594A;
        font-weight: bold;
    }

    /* ========================================================
       MODAL / POPUP COMPONENT STYLES (MODERN FINTECH)
       ======================================================== */
    .edge-modal-backdrop {
        position: fixed;
        inset: 0;
        background: rgba(4, 20, 16, 0.72);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        z-index: 99999;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .edge-modal-backdrop.is-active {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }

    .edge-modal-dialog {
        background: #ffffff;
        border-radius: 28px;
        max-width: 740px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 35px 85px -15px rgba(4, 20, 16, 0.3), 0 0 0 1px rgba(0, 0, 0, 0.05);
        position: relative;
        transform: scale(0.96) translateY(20px);
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        border: 1px solid #E2E8F0;
    }

    .edge-modal-backdrop.is-active .edge-modal-dialog {
        transform: scale(1) translateY(0);
    }

    /* Modal Header */
    .edge-modal-header {
        padding: 32px 38px 22px;
        position: relative;
        background: linear-gradient(180deg, #F8FAFC 0%, #FFFFFF 100%);
        border-bottom: 1px solid #E2E8F0;
    }

    .edge-modal-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-family: var(--font-plus-jakarta);
        font-size: 12px;
        font-weight: 700;
        padding: 5px 14px;
        border-radius: 50px;
        margin-bottom: 10px;
        letter-spacing: 0.4px;
        text-transform: uppercase;
    }

    .edge-modal-badge.badge-pro {
        background: #E6F7F0;
        color: #03594A;
        border: 1px solid rgba(3, 89, 74, 0.18);
    }

    .edge-modal-badge.badge-biz {
        background: #FEF3C7;
        color: #92400E;
        border: 1px solid rgba(146, 64, 14, 0.18);
    }

    .edge-modal-title {
        font-family: var(--font-soliden);
        font-size: 26px;
        font-weight: 700;
        color: #0F172A;
        margin: 0 0 6px;
        line-height: 1.25;
        letter-spacing: -0.3px;
    }

    .edge-modal-subtitle {
        font-family: var(--font-plus-jakarta);
        font-size: 14.5px;
        color: #64748B;
        line-height: 1.55;
        margin: 0;
    }

    .edge-modal-close-btn {
        position: absolute;
        top: 26px;
        right: 28px;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #F1F5F9;
        border: 1px solid #E2E8F0;
        color: #475569;
        font-size: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.25s ease;
        line-height: 1;
    }

    .edge-modal-close-btn:hover {
        background: #E2E8F0;
        color: #0F172A;
        transform: rotate(90deg) scale(1.05);
    }

    /* Modal Body & Forms */
    .edge-modal-body {
        padding: 30px 38px 40px;
    }

    .edge-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .edge-form-full {
        grid-column: 1 / -1;
    }

    /* Modern Section Divider */
    .edge-form-divider {
        grid-column: 1 / -1;
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 14px 0 4px;
    }

    .edge-form-divider span {
        font-family: var(--font-plus-jakarta);
        font-size: 11.5px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: #03594A;
        background: #E6F7F0;
        padding: 4px 14px;
        border-radius: 20px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 1px solid rgba(3, 89, 74, 0.12);
    }

    .edge-form-divider.biz-divider span {
        color: #92400E;
        background: #FEF3C7;
        border-color: rgba(146, 64, 14, 0.15);
    }

    .edge-form-divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #E2E8F0;
    }

    .edge-form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .edge-form-label {
        font-family: var(--font-plus-jakarta);
        font-size: 13.5px;
        font-weight: 700;
        color: #1E293B;
        margin-bottom: 2px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .edge-form-label i {
        color: #64748B;
        font-size: 13px;
    }

    .edge-form-label .req {
        color: #EF4444;
        margin-left: 2px;
    }

    .edge-form-control {
        width: 100%;
        background: #F8FAFC;
        border: 1.5px solid #CBD5E1;
        border-radius: 12px;
        color: #0F172A;
        padding: 13px 16px;
        font-size: 14.5px;
        font-family: var(--font-plus-jakarta);
        outline: none;
        transition: all 0.25s ease;
    }

    .edge-form-control:hover {
        background: #FFFFFF;
        border-color: #94A3B8;
    }

    .edge-form-control:focus {
        background: #FFFFFF;
        border-color: #03594A;
        box-shadow: 0 0 0 4px rgba(3, 89, 74, 0.12), 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .edge-form-control::placeholder {
        color: #94A3B8;
    }

    /* Modern Custom Select with SVG chevron */
    .edge-form-control.edge-select {
        appearance: none;
        -webkit-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23475569' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        background-size: 13px;
        padding-right: 44px;
        cursor: pointer;
    }

    /* Skills Container */
    .edge-skills-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 9px;
        margin-top: 4px;
    }

    .edge-chip-checkbox {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #F8FAFC;
        border: 1.5px solid #E2E8F0;
        border-radius: 10px;
        padding: 10px 14px;
        font-family: var(--font-plus-jakarta);
        font-size: 13.5px;
        font-weight: 600;
        color: #334155;
        cursor: pointer;
        user-select: none;
        transition: all 0.2s ease;
    }

    .edge-chip-checkbox:hover {
        background: #F1F5F9;
        border-color: #CBD5E1;
    }

    .edge-chip-checkbox:has(input:checked) {
        background: #E6F7F0;
        border-color: #03594A;
        color: #03594A;
        font-weight: 700;
        box-shadow: 0 2px 8px rgba(3, 89, 74, 0.1);
    }

    .edge-chip-checkbox input[type="checkbox"] {
        accent-color: #03594A;
        width: 16px;
        height: 16px;
    }

    /* Modern Dropzone File Upload */
    .edge-file-drop {
        border: 2px dashed #CBD5E1;
        background: #F8FAFC;
        border-radius: 16px;
        padding: 24px 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .edge-file-drop:hover {
        border-color: #03594A;
        background: #F0FDF9;
        transform: translateY(-1px);
    }

    .edge-file-icon-wrap {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: #E6F7F0;
        color: #03594A;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-bottom: 10px;
        transition: transform 0.25s ease;
    }

    .edge-file-drop:hover .edge-file-icon-wrap {
        transform: scale(1.1);
    }

    /* Submit Button */
    .edge-submit-btn {
        width: 100%;
        background: linear-gradient(135deg, #03594A 0%, #064035 100%);
        color: #FFFFFF;
        font-family: var(--font-soliden);
        font-size: 17px;
        font-weight: 700;
        letter-spacing: 0.4px;
        padding: 16px 34px;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 10px 25px -4px rgba(3, 89, 74, 0.35);
        margin-top: 14px;
        position: relative;
        overflow: hidden;
    }

    .edge-submit-btn:hover {
        background: linear-gradient(135deg, #056a58 0%, #08493d 100%);
        transform: translateY(-2px);
        box-shadow: 0 14px 30px -4px rgba(3, 89, 74, 0.5);
        color: #FFFFFF;
    }

    .edge-submit-btn:hover .btn-icon {
        transform: translateX(4px);
    }

    .edge-submit-btn .btn-icon {
        transition: transform 0.25s ease;
    }

    /* Alert Box - HIDDEN by default, shown ONLY when populated via JS */
    .edge-alert-box {
        display: none !important;
        align-items: center;
        gap: 12px;
        padding: 14px 18px;
        border-radius: 12px;
        font-family: var(--font-plus-jakarta);
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 22px;
    }

    .edge-alert-box.is-visible {
        display: flex !important;
    }

    .edge-alert-box.alert-success {
        background: rgba(185, 255, 102, 0.2);
        border: 1.5px solid #03594A;
        color: #0C2924;
    }

    .edge-alert-box.alert-error {
        background: #FEE2E2;
        border: 1.5px solid #EF4444;
        color: #991B1B;
    }

    /* Responsive Queries */
    @media (max-width: 991px) {
        .edge-network-glass-overlay {
            padding: 40px 24px 28px;
        }

        .edge-net-header {
            flex-direction: column;
            text-align: center;
        }

        .edge-net-side-tag,
        .edge-net-script-accent {
            display: none;
        }

        .edge-net-cards-wrapper {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .edge-net-center-badge {
            flex-direction: row;
            padding: 10px 0;
        }

        .edge-badge-txt {
            margin-bottom: 0;
            margin-right: 12px;
        }

        .edge-net-values-bar {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }

        .val-sep {
            display: none;
        }

        .edge-net-footer-strip {
            flex-direction: column;
            align-items: flex-start;
        }

        .edge-foot-sep {
            display: none;
        }
    }

    @media (max-width: 576px) {
        .edge-form-grid {
            grid-template-columns: 1fr;
        }
        .edge-modal-header,
        .edge-modal-body {
            padding: 24px 20px;
        }
        .edge-skills-container {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<section class="taxation-feature-section pt-100">
    <div class="container">
        <div class="taxation-card" data-aos="zoom-in-up">
            <div class="taxation-card-content" data-aos="fade-right" data-aos-delay="300"
                data-aos-anchor-placement="center-bottom">
                <h2>{{ $settings['finance_hero_title'] ?? 'Where smart taxation meets smarter business growth.' }}</h2>
                <p>{{ $settings['finance_hero_subtitle'] ?? "We don't just manage taxes — we maximize your potential." }}</p>
                <a href="{{ $settings['finance_hero_btn_url'] ?? '#services' }}" class="btn-learn-more">{{ $settings['finance_hero_btn_text'] ?? 'Learn More' }}</a>
            </div>
            <div class="taxation-card-image">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_hero_img_graphics', 'images/man-1-graphics.webp') }}" class="animate" alt="Smart Taxation Graphic" />
                <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_hero_img_person', 'images/man-1.webp') }}" alt="Smart Taxation" />
            </div>
        </div>
    </div>
</section>

<section class="intro-section pt-100">
    <div class="container">
        <h2 class="intro-title" data-aos="fade-up">{{ $settings['finance_intro_title'] ?? 'Introduction' }}</h2>
        <div class="intro-top-grid" data-aos="fade-up" data-aos-delay="200">
            <div class="intro-top-text">
                <p>{!! $settings['finance_intro_text1'] ?? 'Roy Infinity Edge Consulting is a comprehensive <strong>financial services firm dedicated to empowering businesses</strong> of all sizes achieve their financial goals.' !!}</p>
            </div>
            <div class="intro-top-text">
                <p>{!! $settings['finance_intro_text2'] ?? 'We offer a wide range of expert services, from compliance and bookkeeping to strategic tax planning and growth support.' !!}</p>
            </div>
        </div>

        <div class="intro-visual-container" data-aos="zoom-in" data-aos-delay="400">
            <div class="intro-img-left-wrapper">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_intro_img1', 'images/Financial-1.webp') }}" alt="Financial 1" class="intro-img-left">
                <div class="intro-badge-green">{{ $settings['finance_intro_badge1'] ?? 'Financial' }}</div>
            </div>
            <div class="intro-img-right-wrapper">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_intro_img2', 'images/Financial-2.webp') }}" alt="Financial 2" class="intro-img-right">
                <div class="intro-badge-white">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_intro_badge2_icon', 'images/financial.svg') }}" alt="Badge Icon">
                    <span>{{ $settings['finance_intro_badge2_text'] ?? 'Financial Services' }}</span>
                </div>
            </div>
        </div>

        <div class="intro-bottom-content" data-aos="fade-up" data-aos-delay="600">
            <div class="intro-bg-text">
                <h2 class="bg-text-gray">{{ $settings['finance_intro_bg_line1'] ?? 'Financial' }}</h2>
                <div class="intro-bottom-row">
                    <h2 class="bg-text-green">{{ $settings['finance_intro_bg_line2'] ?? 'Services' }}</h2>
                    <div class="intro-bottom-desc">
                        <p>{!! $settings['finance_intro_bottom_desc'] ?? 'Roy Infinity Edge Consulting is a comprehensive <strong>financial services firm dedicated to empowering businesses</strong> of all sizes achieve their financial goals.' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services-section" id="services">
    <div class="container">
        <div class="services-header" data-aos="fade-up">
            <h2>{{ $settings['finance_services_title'] ?? 'Our Services' }}</h2>
            <p>{{ $settings['finance_services_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}</p>
        </div>

        <div class="services-grid">
            <!-- 1. Financial Reporting & Analysis -->
            @php
                $raw1 = $settings['finance_srv1_points'] ?? 'Detailed Project Reports (DPR) for securing funding or tenders | Financial statements prepared to legal standards | CMA Data and financial analysis for loan applications';
                $srv1_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw1))));
                $srv1_has_more = count($srv1_points) > 3;
            @endphp
            <div class="service-row lime-card" data-aos="fade-up">
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv1_img', 'images/Financial-Reporting-Analysis.png') }}" alt="{{ $settings['finance_srv1_title'] ?? 'Financial Reporting & Analysis' }}">
                </div>
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv1_title'] ?? 'Financial Reporting & Analysis' }}</h3>
                    <p>{{ $settings['finance_srv1_desc'] ?? 'We provide comprehensive financial reporting and analysis, including:' }}</p>
                    <ul>
                        @foreach($srv1_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        <a href="{{ $settings['finance_srv1_tag_url'] ?? '#' }}" class="btn-service-dark">{{ $settings['finance_srv1_tag'] ?? 'Financial' }}</a>
                        @if($srv1_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv1_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv1_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv1_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv1_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- 2. Taxation -->
            @php
                $raw2 = $settings['finance_srv2_points'] ?? 'Personal and corporate tax filings | Strategic tax planning to minimize liabilities | Assistance with tax assessments, appeals, and disputes';
                $srv2_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw2))));
                $srv2_has_more = count($srv2_points) > 3;
            @endphp
            <div class="service-row dark-card inverted" data-aos="fade-up">
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv2_title'] ?? 'Taxation' }}</h3>
                    <p>{{ $settings['finance_srv2_desc'] ?? 'Our team of tax specialists ensures you remain compliant with all regulations while optimizing your tax position. Services include:' }}</p>
                    <ul>
                        @foreach($srv2_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        @if($srv2_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv2_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv2_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv2_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv2_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                        <a href="{{ $settings['finance_srv2_tag_url'] ?? '#' }}" class="btn-service-green">{{ $settings['finance_srv2_tag'] ?? 'Financial' }}</a>
                    </div>
                </div>
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv2_img', 'images/Taxation.png') }}" alt="{{ $settings['finance_srv2_title'] ?? 'Taxation' }}">
                </div>
            </div>

            <!-- 3. TDS Compliance -->
            @php
                $raw3 = $settings['finance_srv3_points'] ?? 'Accurate calculation, deduction, and deposit of TDS as per applicable rules | Timely filing of quarterly TDS returns | Issuance of Form 16/16A certificates to employees and contractors';
                $srv3_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw3))));
                $srv3_has_more = count($srv3_points) > 3;
            @endphp
            <div class="service-row light-card" data-aos="fade-up">
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv3_img', 'images/Financial-Reporting-Analysis.png') }}" alt="{{ $settings['finance_srv3_title'] ?? 'TDS Compliance' }}">
                </div>
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv3_title'] ?? 'TDS Compliance' }}</h3>
                    <p>{{ $settings['finance_srv3_desc'] ?? 'Our experts ensure your business remains compliant with TDS regulations, including:' }}</p>
                    <ul>
                        @foreach($srv3_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        <a href="{{ $settings['finance_srv3_tag_url'] ?? '#' }}" class="btn-service-dark">{{ $settings['finance_srv3_tag'] ?? 'Financial' }}</a>
                        @if($srv3_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv3_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv3_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv3_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv3_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- 4. GST Compliance -->
            @php
                $raw4 = $settings['finance_srv4_points'] ?? 'GST registration and compliance assistance | Timely and accurate GST return filings | GST advisory to optimize your tax management | E-Way Billing & GST Audits & Services';
                $srv4_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw4))));
                $srv4_has_more = count($srv4_points) > 3;
            @endphp
            <div class="service-row lime-card inverted" data-aos="fade-up">
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv4_title'] ?? 'GST Compliance' }}</h3>
                    <p>{{ $settings['finance_srv4_desc'] ?? 'We navigate the complexities of Goods and Services Tax (GST) for you, providing:' }}</p>
                    <ul>
                        @foreach($srv4_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        @if($srv4_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv4_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv4_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv4_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv4_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                        <a href="{{ $settings['finance_srv4_tag_url'] ?? '#' }}" class="btn-service-dark">{{ $settings['finance_srv4_tag'] ?? 'Financial' }}</a>
                    </div>
                </div>
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv4_img', 'images/Taxation.png') }}" alt="{{ $settings['finance_srv4_title'] ?? 'GST Compliance' }}">
                </div>
            </div>

            <!-- 5. Company Incorporation & Compliance -->
            @php
                $raw5 = $settings['finance_srv5_points'] ?? 'Company formation (LLP, Pvt. Ltd., etc.) | Filing of annual returns and financial statements | Company law advisory services';
                $srv5_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw5))));
                $srv5_has_more = count($srv5_points) > 3;
            @endphp
            <div class="service-row dark-card" data-aos="fade-up">
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv5_img', 'images/Financial-Reporting-Analysis.png') }}" alt="{{ $settings['finance_srv5_title'] ?? 'Company Incorporation' }}">
                </div>
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv5_title'] ?? 'Company Incorporation & Compliance:' }}</h3>
                    <p>{{ $settings['finance_srv5_desc'] ?? 'We guide you through the process of incorporating your business and ensure ongoing compliance with the Registrar of Companies (ROC). This includes:' }}</p>
                    <ul>
                        @foreach($srv5_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        <a href="{{ $settings['finance_srv5_tag_url'] ?? '#' }}" class="btn-service-green">{{ $settings['finance_srv5_tag'] ?? 'Financial' }}</a>
                        @if($srv5_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv5_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv5_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv5_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv5_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- 6. Compliance Management -->
            @php
                $raw6 = $settings['finance_srv6_points'] ?? "Employee Provident Fund Organization (EPFO) & Employees' State Insurance Corporation (ESIC) registrations and contributions | Trade license applications and renewals | UDYAM & Professional Tax (P. Tax) registrations | Digital Signature Certificate (DSC) issuance for secure transactions";
                $srv6_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw6))));
                $srv6_has_more = count($srv6_points) > 3;
            @endphp
            <div class="service-row light-card inverted" data-aos="fade-up">
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv6_title'] ?? 'Compliance Management' }}</h3>
                    <p>{{ $settings['finance_srv6_desc'] ?? 'We help you stay compliant with various regulations:' }}</p>
                    <ul>
                        @foreach($srv6_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        @if($srv6_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv6_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv6_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv6_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv6_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                        <a href="{{ $settings['finance_srv6_tag_url'] ?? '#' }}" class="btn-service-dark">{{ $settings['finance_srv6_tag'] ?? 'Financial' }}</a>
                    </div>
                </div>
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv6_img', 'images/Taxation.png') }}" alt="{{ $settings['finance_srv6_title'] ?? 'Compliance Management' }}">
                </div>
            </div>

            <!-- 7. Financial Reporting & Analysis -->
            @php
                $raw7 = $settings['finance_srv7_points'] ?? 'Detailed Project Reports (DPR) for securing funding or tenders | Financial statements prepared to legal standards | CMA Data and financial analysis for loan applications';
                $srv7_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw7))));
                $srv7_has_more = count($srv7_points) > 3;
            @endphp
            <div class="service-row lime-card" data-aos="fade-up">
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv7_img', 'images/Financial-Reporting-Analysis.png') }}" alt="{{ $settings['finance_srv7_title'] ?? 'Financial Reporting & Analysis' }}">
                </div>
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv7_title'] ?? 'Financial Reporting & Analysis' }}</h3>
                    <p>{{ $settings['finance_srv7_desc'] ?? 'We provide comprehensive financial reporting and analysis, including:' }}</p>
                    <ul>
                        @foreach($srv7_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        <a href="{{ $settings['finance_srv7_tag_url'] ?? '#' }}" class="btn-service-dark">{{ $settings['finance_srv7_tag'] ?? 'Financial' }}</a>
                        @if($srv7_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv7_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv7_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv7_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv7_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- 8. Strategic Support -->
            @php
                $raw8 = $settings['finance_srv8_points'] ?? 'Advance tax calculations to avoid penalties | Strategic tax planning for optimal financial outcomes | Comprehensive Intellectual Property (IP) including Trademark Registration, Patent Filing, Copyrights, Design Registration, IP Advisory, Infringement Support, and International IP Protection';
                $srv8_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw8))));
                $srv8_has_more = count($srv8_points) > 3;
            @endphp
            <div class="service-row dark-card inverted" data-aos="fade-up">
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv8_title'] ?? 'Strategic Support' }}</h3>
                    <p>{{ $settings['finance_srv8_desc'] ?? 'Our team offers additional services to propel your business forward:' }}</p>
                    <ul>
                        @foreach($srv8_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        @if($srv8_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv8_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv8_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv8_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv8_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                        <a href="{{ $settings['finance_srv8_tag_url'] ?? '#' }}" class="btn-service-green">{{ $settings['finance_srv8_tag'] ?? 'Financial' }}</a>
                    </div>
                </div>
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv8_img', 'images/Taxation.png') }}" alt="{{ $settings['finance_srv8_title'] ?? 'Strategic Support' }}">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================
     EDGE ACCOUNTS NETWORK SECTION
     ======================================================== -->
<section class="edge-network-section" id="edge-network" data-aos="fade-up">
    <div class="container">
        @if(session('edge_success'))
            <div class="alert alert-success alert-dismissible fade show mb-4 rounded-4 p-3 shadow-sm border-0 d-flex align-items-center gap-3" role="alert" style="background: #ecfdf5; color: #065f46;">
                <i class="fa-solid fa-circle-check fs-4"></i>
                <div class="flex-grow-1">
                    <strong>Success!</strong> {{ session('edge_success') }}
                </div>
            </div>
        @endif

        <div class="edge-network-outer">
            <div class="edge-network-glass-overlay">
                <!-- Header Top Bar -->
                <div class="edge-net-header">
                    <div class="edge-net-side-tag">
                        <span>{!! nl2br(e($settings['finance_edge_side_tag'] ?? "YOUR\nSKILLS\nCAN CREATE\nMORE\nOPPORTUNITIES")) !!}</span>
                    </div>

                    <div class="edge-net-header-center">
                        <div class="edge-net-pill-badge">
                            <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_edge_vriddhi_logo', 'images/vriddhi-edge-logo.png') }}" alt="Vriddhi Edge" class="pill-vriddhi-logo">
                            <span>{{ $settings['finance_edge_badge_text'] ?? 'A Product of Vriddhi Edge' }}</span>
                        </div>
                        <div class="edge-net-brand-title">
                            <span class="edge-net-brand-icon">
                                <span class="e-bar"></span>
                                <span class="e-bar-mid"></span>
                                <span class="e-bar"></span>
                            </span>
                            <span class="edge-net-bold-edge">{{ $settings['finance_edge_title_bold'] ?? 'EDGE' }}</span>
                            <span class="edge-net-light-network">{{ $settings['finance_edge_title_light'] ?? 'Accounts Network' }}</span>
                        </div>
                        <div class="edge-net-sub-title">{{ $settings['finance_edge_subtitle'] ?? 'Accounting Expertise. On Demand.' }}</div>
                        <p class="edge-net-lead-desc">{{ $settings['finance_edge_lead_desc'] ?? 'A professional online accounting network connecting credible accounting professionals with businesses that need reliable accounting support.' }}</p>
                    </div>

                    <div class="edge-net-script-accent">
                        {!! nl2br(e($settings['finance_edge_script_accent'] ?? "Skills\nMeet\nOpportunity")) !!}
                    </div>
                </div>

                <!-- Dual Cards Section -->
                <div class="edge-net-cards-wrapper">
                    <!-- Left Card: For Accounting Professionals -->
                    <div class="edge-net-card edge-card-pro" data-aos="fade-right" data-aos-delay="100">
                        <div class="edge-card-top-icon">
                            <i class="fa-solid fa-user-graduate"></i>
                        </div>
                        <h3 class="edge-card-title">{!! nl2br(e($settings['finance_edge_pro_title'] ?? "FOR ACCOUNTING\nPROFESSIONALS")) !!}</h3>
                        <p class="edge-card-subtitle">{{ $settings['finance_edge_pro_subtitle'] ?? 'Your Expertise. Your Profile. Your Opportunities.' }}</p>
                        
                        @php
                            $proPointsRaw = $settings['finance_edge_pro_points'] ?? "Create your professional profile\nShowcase your skills, experience & areas of expertise\nDiscover relevant accounting assignments\nChoose suitable clients and engagements\nWork remotely on project-based or ongoing assignments\nBuild an additional source of professional income";
                            $proPoints = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $proPointsRaw))));
                        @endphp
                        <ul class="edge-card-checklist">
                            @foreach($proPoints as $pt)
                                <li><span class="edge-chk"><i class="fa-solid fa-check"></i></span> <span>{{ $pt }}</span></li>
                            @endforeach
                        </ul>

                        <button type="button" class="edge-btn-pro js-open-edge-modal" data-modal-target="edgeProfModal">
                            <span>{{ $settings['finance_edge_pro_btn_text'] ?? 'Login / Submit Your Profile' }}</span> <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>

                    <!-- Center Connecting Badge -->
                    <div class="edge-net-center-badge">
                        <span class="edge-badge-txt">{!! nl2br(e($settings['finance_edge_center_text'] ?? "TWO SIDES\nONE EDGE")) !!}</span>
                        <div class="edge-badge-infinity" title="Two Sides, One Edge">
                            <svg viewBox="0 0 100 48" class="infinity-svg" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M28,14 C18,14 10,19 10,24 C10,29 18,34 28,34 C39,34 45,26 50,24 C55,22 61,14 72,14 C82,14 90,19 90,24 C90,29 82,34 72,34 C61,34 55,26 50,24 C45,22 39,14 28,14 Z" stroke="currentColor" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>

                    <!-- Right Card: For Businesses -->
                    <div class="edge-net-card edge-card-biz" data-aos="fade-left" data-aos-delay="100">
                        <div class="edge-card-top-icon">
                            <i class="fa-solid fa-building-user"></i>
                        </div>
                        <h3 class="edge-card-title">{{ $settings['finance_edge_biz_title'] ?? 'FOR BUSINESSES' }}</h3>
                        <p class="edge-card-subtitle">{{ $settings['finance_edge_biz_subtitle'] ?? 'Find Accounting Support Online.' }}</p>
                        <p class="edge-card-desc">{{ $settings['finance_edge_biz_desc'] ?? 'Get access to suitable accounting professionals without the commitment and overhead of hiring a full-time accountant.' }}</p>
                        
                        @php
                            $bizPointsRaw = $settings['finance_edge_biz_points'] ?? "Submit your accounting assignment details\nSpecify your requirements and scope of work\nMention your Expected Budget / Professional Fees (Approx.)\nConnect with suitable accounting professionals\nEngage for project-based or ongoing accounting work";
                            $bizPoints = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $bizPointsRaw))));
                        @endphp
                        <ul class="edge-card-checklist">
                            @foreach($bizPoints as $pt)
                                <li><span class="edge-chk"><i class="fa-solid fa-check"></i></span> <span>{{ $pt }}</span></li>
                            @endforeach
                        </ul>

                        <button type="button" class="edge-btn-biz js-open-edge-modal" data-modal-target="edgeBizModal">
                            <span>{{ $settings['finance_edge_biz_btn_text'] ?? 'Submit Your Requirement' }}</span> <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Values Bar -->
                <div class="edge-net-values-bar" data-aos="fade-up" data-aos-delay="200">
                    <div class="val-item">
                        <i class="fa-solid fa-shield-halved val-icon"></i>
                        <span>{{ $settings['finance_edge_val1'] ?? 'Credible Professionals' }}</span>
                    </div>
                    <div class="val-sep"></div>
                    <div class="val-item">
                        <i class="fa-solid fa-briefcase val-icon"></i>
                        <span>{{ $settings['finance_edge_val2'] ?? 'Relevant Opportunities' }}</span>
                    </div>
                    <div class="val-sep"></div>
                    <div class="val-item">
                        <i class="fa-solid fa-handshake-simple val-icon"></i>
                        <span>{{ $settings['finance_edge_val3'] ?? 'Flexible Accounting Support' }}</span>
                    </div>
                    <div class="val-sep d-none d-lg-block"></div>
                    <div class="val-tagline ms-lg-auto">
                        {{ $settings['finance_edge_val_tagline'] ?? 'A network designed to create value for both professionals and businesses.' }}
                    </div>
                </div>

                <!-- Footer Strip -->
                <div class="edge-net-footer-strip">
                    <div class="edge-foot-col edge-foot-quote">
                        {{ $settings['finance_edge_foot_quote'] ?? 'Not every skilled accounting professional has access to the right clients. And not every business needs — or wants — the cost of a full-time accountant.' }}
                    </div>
                    <div class="edge-foot-sep"></div>
                    <div class="edge-foot-col edge-foot-tagline">
                        <strong>{{ $settings['finance_edge_title_bold'] ?? 'EDGE' }} {{ $settings['finance_edge_title_light'] ?? 'Accounts Network' }}</strong> bridges that gap.<br>
                        <span>One Network. Two Sides. <strong>One Edge.</strong></span>
                    </div>
                    <div class="edge-foot-sep"></div>
                    <div class="edge-foot-col edge-foot-brand">
                        <div class="foot-edge-brand"><strong>{{ $settings['finance_edge_title_bold'] ?? 'EDGE' }}</strong> {{ $settings['finance_edge_title_light'] ?? 'Accounts Network' }}</div>
                        <small>{{ $settings['finance_edge_subtitle'] ?? 'Accounting Expertise. On Demand.' }}</small>
                    </div>
                    <div class="edge-foot-sep"></div>
                    <div class="edge-foot-col edge-foot-product">
                        <small class="foot-subhead">A product under</small>
                        <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_edge_vriddhi_logo', 'images/vriddhi-edge-logo.png') }}" alt="Vriddhi Edge" class="foot-vriddhi-logo">
                    </div>
                    <div class="edge-foot-sep"></div>
                    <div class="edge-foot-col edge-foot-powered">
                        <div class="d-flex align-items-center gap-2">
                            <span class="foot-infinity">∞</span>
                            <div>
                                <small class="d-block text-muted">Powered by</small>
                                <strong>{{ $settings['finance_edge_foot_powered'] ?? 'Roy Infinity Edge Consulting' }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================
     MODAL 1: ACCOUNTING PROFESSIONALS SUBMISSION
     ======================================================== -->
<div class="edge-modal-backdrop" id="edgeProfModal" aria-hidden="true" role="dialog">
    <div class="edge-modal-dialog">
        <div class="edge-modal-header">
            <button type="button" class="edge-modal-close-btn js-close-edge-modal" aria-label="Close modal">&times;</button>
            <span class="edge-modal-badge badge-pro"><img src="{{ \App\Models\SiteSetting::getImageUrl('finance_edge_vriddhi_logo', 'images/vriddhi-edge-logo.png') }}" alt="Vriddhi Edge" style="height: 13px; width: auto; vertical-align: middle; margin-right: 4px;"> Professionals Portal</span>
            <h3 class="edge-modal-title">Submit Your Professional Profile</h3>
            <p class="edge-modal-subtitle">Connect with high-value business clients and explore flexible, remote accounting assignments.</p>
        </div>

        <div class="edge-modal-body">
            <div class="edge-alert-box" id="profAlert" style="display: none;"></div>

            <form action="{{ route('edge-network.submit') }}" method="POST" enctype="multipart/form-data" class="edge-network-form" id="profSubmitForm">
                @csrf
                <input type="hidden" name="type" value="professional">

                <div class="edge-form-grid">
                    <!-- Section Divider 1 -->
                    <div class="edge-form-divider">
                        <span><i class="fa-regular fa-id-card"></i> 1. Contact Information</span>
                    </div>

                    <!-- Name -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-regular fa-user text-muted"></i> Full Name <span class="req">*</span></label>
                        <input type="text" name="name" class="edge-form-control" placeholder="e.g. Rajesh Kumar" required>
                    </div>

                    <!-- Email -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-regular fa-envelope text-muted"></i> Email Address <span class="req">*</span></label>
                        <input type="email" name="email" class="edge-form-control" placeholder="e.g. rajesh@example.com" required>
                    </div>

                    <!-- Phone -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-solid fa-phone text-muted"></i> Phone / WhatsApp Number <span class="req">*</span></label>
                        <input type="tel" name="phone" class="edge-form-control" placeholder="e.g. +91 98765 43210" required>
                    </div>

                    <!-- City -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-solid fa-location-dot text-muted"></i> Current City / Location <span class="req">*</span></label>
                        <input type="text" name="city" class="edge-form-control" placeholder="e.g. Mumbai, Maharashtra" required>
                    </div>

                    <!-- Section Divider 2 -->
                    <div class="edge-form-divider">
                        <span><i class="fa-solid fa-graduation-cap"></i> 2. Qualifications &amp; Availability</span>
                    </div>

                    <!-- Qualification -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-solid fa-certificate text-muted"></i> Primary Qualification <span class="req">*</span></label>
                        <select name="qualification" class="edge-form-control edge-select" required>
                            <option value="">Select Qualification</option>
                            <option value="Chartered Accountant (CA)">Chartered Accountant (CA)</option>
                            <option value="Cost & Management Accountant (CMA)">Cost &amp; Management Accountant (CMA)</option>
                            <option value="Company Secretary (CS)">Company Secretary (CS)</option>
                            <option value="CPA / ACCA">CPA / ACCA</option>
                            <option value="M.Com / Master in Finance">M.Com / Master in Finance</option>
                            <option value="B.Com Graduate">B.Com Graduate</option>
                            <option value="MBA (Finance)">MBA (Finance)</option>
                            <option value="Tax Advocate / Practitioner">Tax Advocate / Practitioner</option>
                            <option value="Experienced Accountant">Experienced Accountant / Other</option>
                        </select>
                    </div>

                    <!-- Experience -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-solid fa-clock-rotate-left text-muted"></i> Total Experience</label>
                        <select name="experience_years" class="edge-form-control edge-select">
                            <option value="Fresher (< 1 Year)">Fresher (&lt; 1 Year)</option>
                            <option value="1 - 3 Years">1 - 3 Years</option>
                            <option value="3 - 5 Years" selected>3 - 5 Years</option>
                            <option value="5 - 8 Years">5 - 8 Years</option>
                            <option value="8+ Years">8+ Years</option>
                        </select>
                    </div>

                    <!-- Availability -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-solid fa-calendar-check text-muted"></i> Availability Preference</label>
                        <select name="availability" class="edge-form-control edge-select">
                            <option value="Project-Based / Freelance" selected>Project-Based / Freelance</option>
                            <option value="Part-time Remote">Part-time Remote</option>
                            <option value="Full-time Remote">Full-time Remote</option>
                            <option value="Flexible / Hourly">Flexible / Hourly</option>
                        </select>
                    </div>

                    <!-- Expected Fees -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-solid fa-indian-rupee-sign text-muted"></i> Expected Fees / Rate (Approx.)</label>
                        <input type="text" name="expected_fees" class="edge-form-control" placeholder="e.g. ₹20,000/mo or ₹500/hr (Negotiable)">
                    </div>

                    <!-- Section Divider 3 -->
                    <div class="edge-form-divider">
                        <span><i class="fa-solid fa-layer-group"></i> 3. Expertise &amp; Resume</span>
                    </div>

                    <!-- Skills & Expertise -->
                    <div class="edge-form-full edge-form-group">
                        <label class="edge-form-label"><i class="fa-solid fa-list-check text-muted"></i> Core Skills &amp; Areas of Expertise</label>
                        <div class="edge-skills-container">
                            <label class="edge-chip-checkbox">
                                <input type="checkbox" name="skills[]" value="GST Return & Compliance">
                                <span>GST Compliance &amp; Filings</span>
                            </label>
                            <label class="edge-chip-checkbox">
                                <input type="checkbox" name="skills[]" value="Income Tax & TDS">
                                <span>Income Tax &amp; TDS</span>
                            </label>
                            <label class="edge-chip-checkbox">
                                <input type="checkbox" name="skills[]" value="Bookkeeping & Finalization">
                                <span>Bookkeeping &amp; Finalization</span>
                            </label>
                            <label class="edge-chip-checkbox">
                                <input type="checkbox" name="skills[]" value="Tally / Zoho / QuickBooks">
                                <span>Tally / Zoho / QuickBooks</span>
                            </label>
                            <label class="edge-chip-checkbox">
                                <input type="checkbox" name="skills[]" value="ROC & Company Compliance">
                                <span>ROC &amp; MCA Filings</span>
                            </label>
                            <label class="edge-chip-checkbox">
                                <input type="checkbox" name="skills[]" value="Financial Audits">
                                <span>Financial Audits &amp; Reviews</span>
                            </label>
                            <label class="edge-chip-checkbox">
                                <input type="checkbox" name="skills[]" value="CMA Data & DPR Reports">
                                <span>CMA Data &amp; Project Reports</span>
                            </label>
                            <label class="edge-chip-checkbox">
                                <input type="checkbox" name="skills[]" value="Payroll & Labor Laws">
                                <span>Payroll &amp; Labor Laws</span>
                            </label>
                        </div>
                    </div>

                    <!-- Resume Upload -->
                    <div class="edge-form-full edge-form-group">
                        <label class="edge-form-label"><i class="fa-solid fa-file-arrow-up text-muted"></i> Upload Resume / CV (PDF or DOC, max 5MB)</label>
                        <label class="edge-file-drop">
                            <div class="edge-file-icon-wrap">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                            </div>
                            <span class="d-block small text-dark fw-bold file-name-display">Click to browse or drag resume here</span>
                            <span class="d-block text-muted" style="font-size: 11.5px; margin-top: 3px;">Supported formats: PDF, DOC, DOCX up to 5MB</span>
                            <input type="file" name="resume" accept=".pdf,.doc,.docx" class="d-none edge-file-input">
                        </label>
                    </div>

                    <!-- Bio -->
                    <div class="edge-form-full edge-form-group">
                        <label class="edge-form-label"><i class="fa-regular fa-file-lines text-muted"></i> Brief Bio / Professional Summary</label>
                        <textarea name="bio" rows="3" class="edge-form-control" placeholder="Share a few words about your accounting experience, certifications, and client projects..."></textarea>
                    </div>
                </div>

                <button type="submit" class="edge-submit-btn btn-pro-submit mt-4">
                    <span class="btn-text">Submit Professional Profile</span>
                    <i class="fa-solid fa-arrow-right btn-icon"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- ========================================================
     MODAL 2: BUSINESSES REQUIREMENT SUBMISSION
     ======================================================== -->
<div class="edge-modal-backdrop" id="edgeBizModal" aria-hidden="true" role="dialog">
    <div class="edge-modal-dialog">
        <div class="edge-modal-header">
            <button type="button" class="edge-modal-close-btn js-close-edge-modal" aria-label="Close modal">&times;</button>
            <span class="edge-modal-badge badge-biz"><img src="{{ \App\Models\SiteSetting::getImageUrl('finance_edge_vriddhi_logo', 'images/vriddhi-edge-logo.png') }}" alt="Vriddhi Edge" style="height: 13px; width: auto; vertical-align: middle; margin-right: 4px;"> Business Portal</span>
            <h3 class="edge-modal-title">Submit Your Accounting Requirement</h3>
            <p class="edge-modal-subtitle">Access verified accounting talent on-demand without the high cost of full-time hiring.</p>
        </div>

        <div class="edge-modal-body">
            <div class="edge-alert-box" id="bizAlert" style="display: none;"></div>

            <form action="{{ route('edge-network.submit') }}" method="POST" enctype="multipart/form-data" class="edge-network-form" id="bizSubmitForm">
                @csrf
                <input type="hidden" name="type" value="business">

                <div class="edge-form-grid">
                    <!-- Section Divider 1 -->
                    <div class="edge-form-divider biz-divider">
                        <span><i class="fa-regular fa-building"></i> 1. Company &amp; Contact Details</span>
                    </div>

                    <!-- Company Name -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-regular fa-building text-muted"></i> Business / Company Name <span class="req">*</span></label>
                        <input type="text" name="company_name" class="edge-form-control" placeholder="e.g. Acme Enterprises Pvt Ltd" required>
                    </div>

                    <!-- Contact Person -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-regular fa-user text-muted"></i> Contact Person Name <span class="req">*</span></label>
                        <input type="text" name="name" class="edge-form-control" placeholder="e.g. Suman Mehta" required>
                    </div>

                    <!-- Email -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-regular fa-envelope text-muted"></i> Official Email Address <span class="req">*</span></label>
                        <input type="email" name="email" class="edge-form-control" placeholder="e.g. contact@acme.com" required>
                    </div>

                    <!-- Phone -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-solid fa-phone text-muted"></i> Phone Number <span class="req">*</span></label>
                        <input type="tel" name="phone" class="edge-form-control" placeholder="e.g. +91 98765 12345" required>
                    </div>

                    <!-- Location / City -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-solid fa-location-dot text-muted"></i> City / Location <span class="req">*</span></label>
                        <input type="text" name="city" class="edge-form-control" placeholder="e.g. Kolkata, West Bengal" required>
                    </div>

                    <!-- Industry / Business Nature -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-solid fa-industry text-muted"></i> Industry / Nature of Business</label>
                        <select name="business_nature" class="edge-form-control edge-select">
                            <option value="">Select Industry</option>
                            <option value="Manufacturing">Manufacturing</option>
                            <option value="Retail & Wholesale Trading">Retail &amp; Wholesale Trading</option>
                            <option value="IT, Software & Tech">IT, Software &amp; Tech</option>
                            <option value="Services & Consulting">Services &amp; Consulting</option>
                            <option value="E-Commerce & Digital">E-Commerce &amp; Digital</option>
                            <option value="Healthcare & Pharma">Healthcare &amp; Pharma</option>
                            <option value="Real Estate & Construction">Real Estate &amp; Construction</option>
                            <option value="Food & Hospitality">Food &amp; Hospitality</option>
                            <option value="Startup / Early Stage">Startup / Early Stage</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <!-- Section Divider 2 -->
                    <div class="edge-form-divider biz-divider">
                        <span><i class="fa-solid fa-sliders"></i> 2. Requirement Scope &amp; Service</span>
                    </div>

                    <!-- Service Needed -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-solid fa-calculator text-muted"></i> Required Service / Domain <span class="req">*</span></label>
                        <select name="service_needed" class="edge-form-control edge-select" required>
                            <option value="">Select Service Needed</option>
                            <option value="Monthly Bookkeeping & Accounting">Monthly Bookkeeping &amp; Accounting</option>
                            <option value="GST Filing, Audit & Reconciliation">GST Filing, Audit &amp; Reconciliation</option>
                            <option value="Income Tax & TDS Filings">Income Tax &amp; TDS Filings</option>
                            <option value="ROC & Annual Company Compliance">ROC &amp; Annual Company Compliance</option>
                            <option value="Payroll Processing & Labor Compliance">Payroll Processing &amp; Labor Compliance</option>
                            <option value="Project Reports (DPR) & Loan CMA Data">Project Reports (DPR) &amp; Loan CMA Data</option>
                            <option value="Virtual CFO / Financial Advisory">Virtual CFO / Financial Advisory</option>
                            <option value="Full-Service Accounting Package">Full-Service Accounting Package</option>
                        </select>
                    </div>

                    <!-- Engagement Type -->
                    <div class="edge-form-group">
                        <label class="edge-form-label"><i class="fa-solid fa-handshake text-muted"></i> Engagement Model</label>
                        <select name="engagement_type" class="edge-form-control edge-select">
                            <option value="Ongoing Monthly Support" selected>Ongoing Monthly Support</option>
                            <option value="One-Time Assignment">One-Time Assignment</option>
                            <option value="Quarterly / Annual Review">Quarterly / Annual Review</option>
                            <option value="Dedicated Remote Accountant">Dedicated Remote Accountant</option>
                        </select>
                    </div>

                    <!-- Expected Budget -->
                    <div class="edge-form-full edge-form-group">
                        <label class="edge-form-label"><i class="fa-solid fa-indian-rupee-sign text-muted"></i> Expected Budget / Professional Fees (Approx.)</label>
                        <input type="text" name="expected_budget" class="edge-form-control" placeholder="e.g. ₹15,000 - ₹25,000 / month or ₹50,000 one-time">
                    </div>

                    <!-- Section Divider 3 -->
                    <div class="edge-form-divider biz-divider">
                        <span><i class="fa-regular fa-file-lines"></i> 3. Scope of Work &amp; Attachment</span>
                    </div>

                    <!-- Scope of Work & Details -->
                    <div class="edge-form-full edge-form-group">
                        <label class="edge-form-label"><i class="fa-regular fa-comment-dots text-muted"></i> Specify Your Requirements and Scope of Work <span class="req">*</span></label>
                        <textarea name="requirement_details" rows="4" class="edge-form-control" placeholder="Describe the transactions volume, accounting software used (e.g. Tally, Zoho), timeline, and specific deliverables expected..." required></textarea>
                    </div>

                    <!-- Optional Attachment -->
                    <div class="edge-form-full edge-form-group">
                        <label class="edge-form-label"><i class="fa-solid fa-paperclip text-muted"></i> Optional RFP / Scope Attachment (PDF, DOC, ZIP, max 5MB)</label>
                        <label class="edge-file-drop">
                            <div class="edge-file-icon-wrap">
                                <i class="fa-solid fa-paperclip"></i>
                            </div>
                            <span class="d-block small text-dark fw-bold file-name-display">Click to attach document or requirement file</span>
                            <span class="d-block text-muted" style="font-size: 11.5px; margin-top: 3px;">Supported formats: PDF, DOC, DOCX, ZIP, PNG, JPG up to 5MB</span>
                            <input type="file" name="attachment" accept=".pdf,.doc,.docx,.zip,.png,.jpg,.jpeg" class="d-none edge-file-input">
                        </label>
                    </div>
                </div>

                <button type="submit" class="edge-submit-btn btn-biz-submit mt-4">
                    <span class="btn-text">Submit Requirement</span>
                    <i class="fa-solid fa-arrow-right btn-icon"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<section class="additional-services-section">
    <div class="container">
        <div class="additional-header-banner" data-aos="fade-up">
            <div>
                <h2>{{ $settings['finance_add_title'] ?? 'Additional Services' }}</h2>
                <p>{{ $settings['finance_add_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}</p>
            </div>

            <div class="additional-content-grid">
                <!-- FSSAI License -->
                <div class="additional-card bg-dark-green-v2" data-aos="zoom-in">
                    <h4>{{ $settings['finance_add1_title'] ?? 'FSSAI License' }}</h4>
                    <p>{{ $settings['finance_add1_desc'] ?? 'We assist food businesses with acquiring and renewing their Food Safety and Standards Authority of India (FSSAI) license, ensuring compliance with safety standards.' }}</p>
                </div>

                <!-- RERA Registration -->
                <div class="additional-card bg-lime-v2" data-aos="zoom-in">
                    <h4>{{ $settings['finance_add2_title'] ?? 'RERA Registration' }}</h4>
                    <p>{{ $settings['finance_add2_desc'] ?? 'Our experts provide support for Real Estate Regulatory Authority (RERA) registration, ensuring your real estate projects adhere to legal requirements.' }}</p>
                </div>
            </div>
        </div>

        <div class="additional-content-grid">
            <!-- Left Tall Image Box -->
            <div class="additional-left-box" data-aos="fade-right">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_add_left_img', 'images/additional-left.png') }}" alt="Financial background">
            </div>

            <!-- Stock Audit -->
            <div class="additional-card bg-light-v2" data-aos="zoom-in">
                <h4>{{ $settings['finance_add3_title'] ?? 'Stock Audit' }}</h4>
                <p>{{ $settings['finance_add3_desc'] ?? 'We conduct thorough stock audits to help you maintain accurate inventory records, identify discrepancies, and ensure optimal stock levels.' }}</p>
            </div>

            <!-- IEC Registration -->
            <div class="additional-card bg-black-v2" data-aos="zoom-in">
                <h4>{{ $settings['finance_add4_title'] ?? 'Import Export Code (IEC) Registration' }}</h4>
                <p>{{ $settings['finance_add4_desc'] ?? 'We assist businesses in obtaining IEC registration for engaging in international trade, ensuring compliance with export-import regulations' }}</p>
            </div>

            <!-- FCRA Registration -->
            <div class="additional-card bg-dark-green-v2" data-aos="zoom-in">
                <h4>{{ $settings['finance_add5_title'] ?? 'FCRA Registration' }}</h4>
                <p>{{ $settings['finance_add5_desc'] ?? 'For NGOs and associations receiving foreign contributions, we provide Foreign Contribution (Regulation) Act (FCRA) registration and compliance services.' }}</p>
            </div>

            <!-- MSME/SSI Registration -->
            <div class="additional-card bg-lime-v2" data-aos="zoom-in">
                <h4>{{ $settings['finance_add6_title'] ?? 'MSME/SSI Registration' }}</h4>
                <p>{{ $settings['finance_add6_desc'] ?? 'We help small businesses and micro-enterprises obtain MSME (Micro, Small & Medium Enterprises) registration to avail government schemes and benefits.' }}</p>
            </div>

            <!-- CE License -->
            <div class="additional-card bg-black-v2 card-ce-v2" data-aos="fade-up">
                <h4>{{ $settings['finance_add7_title'] ?? 'CE (Clinical Establishment) License' }}</h4>
                <p>{{ $settings['finance_add7_desc'] ?? 'We provide Clinical Establishment Licensing services obtaining compliance, application preparation, inspections, policies, training, and ongoing support for regulatory changes and renewals.' }}</p>
            </div>
        </div>
    </div>
</section>

<section class="cta-banner-section" data-aos="zoom-in">
    <div class="container">
        <div class="cta-banner-card">
            <h2>{{ $settings['finance_cta_title'] ?? 'Ready to Contact with us ?' }}</h2>
            <a href="{{ $settings['finance_cta_btn_url'] ?? '#contact' }}" class="btn-get-started-white">{{ $settings['finance_cta_btn_text'] ?? 'Get Started' }} <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.js-toggle-service-points').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const card = this.closest('.service-row');
                if (!card) return;

                const hiddenPoints = card.querySelectorAll('.service-extra-point');
                const label = this.querySelector('.btn-learn-label');
                const moreText = this.getAttribute('data-more-text') || 'Learn more';
                const lessText = this.getAttribute('data-less-text') || 'Show less';
                const isExpanded = this.classList.contains('is-expanded');

                if (isExpanded) {
                    hiddenPoints.forEach(function(el) {
                        el.classList.add('is-hidden');
                    });
                    this.classList.remove('is-expanded');
                    if (label) label.textContent = moreText;
                } else {
                    hiddenPoints.forEach(function(el) {
                        el.classList.remove('is-hidden');
                    });
                    this.classList.add('is-expanded');
                    if (label) label.textContent = lessText;
                }
            });
        });

        /* ========================================================
           EDGE ACCOUNTS NETWORK MODAL POPUP & FORM LOGIC
           ======================================================== */
        function openEdgeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (!modal) return;
            modal.classList.add('is-active');
            document.body.style.overflow = 'hidden';
        }

        function closeAllEdgeModals() {
            document.querySelectorAll('.edge-modal-backdrop.is-active').forEach(function(modal) {
                modal.classList.remove('is-active');
            });
            document.body.style.overflow = '';
        }

        // Open Modal buttons
        document.querySelectorAll('.js-open-edge-modal').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const targetModal = this.getAttribute('data-modal-target');
                if (targetModal) {
                    openEdgeModal(targetModal);
                }
            });
        });

        // Close Modal buttons
        document.querySelectorAll('.js-close-edge-modal').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                closeAllEdgeModals();
            });
        });

        // Backdrop click to close
        document.querySelectorAll('.edge-modal-backdrop').forEach(function(backdrop) {
            backdrop.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeAllEdgeModals();
                }
            });
        });

        // Escape key to close
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' || e.key === 'Esc') {
                closeAllEdgeModals();
            }
        });

        // File upload input display name
        document.querySelectorAll('.edge-file-input').forEach(function(input) {
            input.addEventListener('change', function() {
                const label = this.closest('.edge-file-drop');
                const display = label ? label.querySelector('.file-name-display') : null;
                if (this.files && this.files.length > 0) {
                    const file = this.files[0];
                    const sizeMb = (file.size / (1024 * 1024)).toFixed(2);
                    if (display) {
                        display.innerHTML = '<i class="fa-solid fa-file me-1 text-success"></i> ' + file.name + ' (' + sizeMb + ' MB)';
                    }
                } else {
                    if (display) {
                        display.textContent = 'Click to browse or drag file here';
                    }
                }
            });
        });

        // AJAX Form Submission Handler
        function handleEdgeFormSubmit(formId, alertId, defaultBtnText) {
            const form = document.getElementById(formId);
            const alertBox = document.getElementById(alertId);
            if (!form) return;

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const submitBtn = form.querySelector('.edge-submit-btn');
                const btnText = submitBtn ? submitBtn.querySelector('.btn-text') : null;
                const btnIcon = submitBtn ? submitBtn.querySelector('.btn-icon') : null;

                // Reset alert
                if (alertBox) {
                    alertBox.className = 'edge-alert-box';
                    alertBox.style.display = 'none';
                    alertBox.classList.remove('is-visible');
                    alertBox.innerHTML = '';
                }

                // Button loading state
                if (submitBtn) {
                    submitBtn.disabled = true;
                    if (btnText) btnText.textContent = 'Submitting...';
                    if (btnIcon) {
                        btnIcon.className = 'fa-solid fa-spinner fa-spin btn-icon';
                    }
                }

                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(function(res) {
                    return res.json().then(function(data) {
                        return { status: res.status, ok: res.ok, data: data };
                    });
                })
                .then(function(result) {
                    if (result.ok && result.data.success) {
                        if (alertBox) {
                            alertBox.className = 'edge-alert-box alert-success is-visible';
                            alertBox.innerHTML = '<i class="fa-solid fa-circle-check fs-5" style="color: #03594A;"></i> <span>' + result.data.message + '</span>';
                            alertBox.style.display = 'flex';
                        }
                        form.reset();
                        // Reset file input label
                        const fileDisplay = form.querySelector('.file-name-display');
                        if (fileDisplay) {
                            fileDisplay.textContent = 'Click to browse or drag file here';
                        }

                        // Scroll modal body to top to see message
                        const modalDialog = form.closest('.edge-modal-dialog');
                        if (modalDialog) modalDialog.scrollTop = 0;

                        // Auto close after 3.5 seconds
                        setTimeout(function() {
                            closeAllEdgeModals();
                            if (alertBox) {
                                alertBox.style.display = 'none';
                                alertBox.classList.remove('is-visible');
                            }
                        }, 3500);
                    } else {
                        let errMsg = result.data.message || 'Something went wrong. Please check your inputs and try again.';
                        if (result.data.errors) {
                            errMsg = Object.values(result.data.errors).flat().join('<br>');
                        }
                        if (alertBox) {
                            alertBox.className = 'edge-alert-box alert-error is-visible';
                            alertBox.innerHTML = '<i class="fa-solid fa-triangle-exclamation fs-5" style="color: #dc2626;"></i> <div>' + errMsg + '</div>';
                            alertBox.style.display = 'flex';
                        }
                    }
                })
                .catch(function(err) {
                    console.error('Submission error:', err);
                    if (alertBox) {
                        alertBox.className = 'edge-alert-box alert-error is-visible';
                        alertBox.innerHTML = '<i class="fa-solid fa-triangle-exclamation fs-5" style="color: #dc2626;"></i> <span>Network error. Please try again or refresh the page.</span>';
                        alertBox.style.display = 'flex';
                    }
                })
                .finally(function() {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        if (btnText) btnText.textContent = defaultBtnText;
                        if (btnIcon) {
                            btnIcon.className = 'fa-solid fa-arrow-right btn-icon';
                        }
                    }
                });
            });
        }

        handleEdgeFormSubmit('profSubmitForm', 'profAlert', 'Submit Professional Profile');
        handleEdgeFormSubmit('bizSubmitForm', 'bizAlert', 'Submit Requirement');
    });
</script>
@endpush
