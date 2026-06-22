<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maulaaa - Portfolio</title>
<link rel="icon" href="{{ asset('images/portofolio.png') }}" type="image/x-icon">
    
    <!-- External Libraries -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- ============================================
         ALL CSS INLINE
    ============================================= -->
    <style>
        /* ===== ROOT VARIABLES ===== */
        :root {
            --primary: #05070fff;
            --primary-light: #1a237e;
            --primary-dark: #05070fff;
            --secondary: #05070fff;
            --accent: #42a5f5;
            --accent-light: #64b5f6;
            --text-light: #ffffff;
            --text-dark: #e3f2fd;
            --text-muted: #90caf9;
            --gradient-1: linear-gradient(135deg, #0d1b4a 0%, #05070fff 100%);
            --gradient-2: linear-gradient(135deg, #1a237e 0%, #42a5f5 100%);
            --gradient-3: linear-gradient(45deg, #0d1b4a, #1565c0, #42a5f5);
            --shadow-1: 0 10px 30px rgba(13, 27, 74, 0.3);
            --shadow-2: 0 20px 60px rgba(21, 101, 192, 0.4);
            --shadow-glow: 0 0 20px rgba(66, 165, 245, 0.5);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ===== RESET ===== */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        html { scroll-behavior: smooth; scroll-padding-top: 80px; }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--primary-dark);
            color: var(--text-light);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* ===== CURSOR TRAIL ===== */
        .cursor-dot {
            position: fixed;
            width: 12px;
            height: 12px;
            background: var(--accent);
            border-radius: 50%;
            pointer-events: none;
            z-index: 99999;
            transition: transform 0.1s;
            box-shadow: 0 0 10px var(--accent), 0 0 20px var(--accent), 0 0 30px var(--accent-light);
            animation: cursorPulse 1s infinite;
        }

        .cursor-dot::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 24px;
            height: 24px;
            border: 2px solid var(--accent-light);
            border-radius: 50%;
            animation: cursorRing 1s infinite;
        }

        @keyframes cursorPulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }

        @keyframes cursorRing {
            0% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
            100% { transform: translate(-50%, -50%) scale(2); opacity: 0; }
        }

        /* ===== PARTICLES ===== */
        .particles-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background: var(--accent);
            border-radius: 50%;
            opacity: 0.3;
            animation: floatParticle linear infinite;
            box-shadow: 0 0 10px var(--accent);
        }

        @keyframes floatParticle {
            0% { transform: translateY(100vh) translateX(0) rotate(0deg); opacity: 0; }
            10% { opacity: 0.3; }
            90% { opacity: 0.3; }
            100% { transform: translateY(-100px) translateX(100px) rotate(360deg); opacity: 0; }
        }

        /* ===== NAVIGATION ===== */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 1rem 0;
            background: rgba(13, 27, 74, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            transition: var(--transition);
            border-bottom: 1px solid rgba(66, 165, 245, 0.1);
        }

        .navbar.scrolled {
            padding: 0.5rem 0;
            box-shadow: var(--shadow-1);
            background: rgba(6, 13, 46, 0.98);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            color: var(--text-light);
            font-weight: 700;
            font-size: 1.5rem;
        }

        .logo-icon {
            font-size: 2rem;
            animation: logoRotate 3s ease-in-out infinite;
        }

        @keyframes logoRotate {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(360deg); }
        }

        .logo-text {
            background: var(--gradient-2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 500;
            position: relative;
            transition: var(--transition);
            padding: 0.5rem 0;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient-2);
            transition: var(--transition);
        }

        .nav-link:hover, .nav-link.active { color: var(--accent); }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            z-index: 1001;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: var(--text-light);
            transition: var(--transition);
            border-radius: 2px;
        }

        .hamburger.active span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
        .hamburger.active span:nth-child(2) { opacity: 0; }
        .hamburger.active span:nth-child(3) { transform: rotate(-45deg) translate(7px, -6px); }

        /* ===== HERO ===== */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            background: var(--gradient-1);
            overflow: hidden;
            padding-top: 80px;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%2342a5f5" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,170.7C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
            opacity: 0.5;
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-greeting {
            font-size: 1.2rem;
            color: var(--accent-light);
            margin-bottom: 0.5rem;
            animation: slideInLeft 1s ease;
        }

        .hero-name {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: var(--gradient-2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: slideInLeft 1s ease 0.2s backwards;
        }

        .hero-title {
            font-size: 1.8rem;
            color: var(--text-muted);
            margin-bottom: 1.5rem;
            min-height: 2.5rem;
            animation: slideInLeft 1s ease 0.4s backwards;
        }

        .typing-text {
            border-right: 3px solid var(--accent);
            padding-right: 5px;
            animation: blink 0.7s infinite;
        }

        @keyframes blink {
            0%, 100% { border-color: var(--accent); }
            50% { border-color: transparent; }
        }

        .hero-description {
            font-size: 1.1rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
            line-height: 1.8;
            animation: slideInLeft 1s ease 0.6s backwards;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 3rem;
            animation: slideInLeft 1s ease 0.8s backwards;
        }

        .btn {
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before { width: 300px; height: 300px; }

        .btn-primary {
            background: var(--gradient-2);
            color: var(--text-light);
            box-shadow: var(--shadow-glow);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 30px rgba(66, 165, 245, 0.8);
        }

        .btn-secondary {
            background: transparent;
            color: var(--accent);
            border: 2px solid var(--accent);
        }

        .btn-secondary:hover {
            background: var(--accent);
            color: var(--primary-dark);
            transform: translateY(-3px);
        }

        .hero-stats {
            display: flex;
            gap: 2rem;
            animation: slideInLeft 1s ease 1s backwards;
        }

        .stat-item { text-align: center; }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--accent);
            display: block;
        }

        .stat-label { font-size: 0.9rem; color: var(--text-muted); }

        .hero-image {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: slideInRight 1s ease 0.5s backwards;
        }

        .image-wrapper {
            position: relative;
            width: 400px;
            height: 400px;
        }

        .profile-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid var(--accent);
            box-shadow: var(--shadow-glow);
            animation: profileFloat 3s ease-in-out infinite;
            position: relative;
            z-index: 2;
        }

        .profile-image img { width: 100%; height: 100%; object-fit: cover; }

        @keyframes profileFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: var(--gradient-2);
            opacity: 0.3;
            animation: shapeFloat 4s ease-in-out infinite;
        }

        .shape-1 { width: 80px; height: 80px; top: -20px; right: -20px; animation-delay: 0s; }
        .shape-2 { width: 60px; height: 60px; bottom: -10px; left: -10px; animation-delay: 1s; }
        .shape-3 { width: 40px; height: 40px; top: 50%; left: -30px; animation-delay: 2s; }

        @keyframes shapeFloat {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(20px, -20px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
        }

        .scroll-indicator {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            animation: bounce 2s infinite;
        }

        .mouse {
            width: 30px;
            height: 50px;
            border: 2px solid var(--accent);
            border-radius: 20px;
            margin: 0 auto 0.5rem;
            position: relative;
        }

        .wheel {
            width: 4px;
            height: 10px;
            background: var(--accent);
            border-radius: 2px;
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            animation: scroll 2s infinite;
        }

        @keyframes scroll {
            0% { top: 10px; opacity: 1; }
            100% { top: 30px; opacity: 0; }
        }

        @keyframes bounce {
            0%, 100% { transform: translateX(-50%) translateY(0); }
            50% { transform: translateX(-50%) translateY(-10px); }
        }

        /* ===== SECTIONS ===== */
        .section { padding: 6rem 0; position: relative; }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-header { text-align: center; margin-bottom: 4rem; }

        .section-subtitle {
            display: inline-block;
            color: var(--accent);
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 0.5rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: var(--gradient-2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .title-decoration {
            width: 80px;
            height: 4px;
            background: var(--gradient-2);
            margin: 0 auto;
            border-radius: 2px;
            position: relative;
        }

        .title-decoration::before, .title-decoration::after {
            content: '';
            position: absolute;
            width: 10px;
            height: 10px;
            background: var(--accent);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        .title-decoration::before { left: -20px; }
        .title-decoration::after { right: -20px; }

        /* ===== ABOUT ===== */
        .about { background: var(--primary); }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 4rem;
            align-items: start;
        }

        .about-img-wrapper { position: relative; }
        .about-img-wrapper img { width: 100%; border-radius: 20px; box-shadow: var(--shadow-2); }

        .experience-badge {
            position: absolute;
            bottom: -20px;
            right: -20px;
            background: var(--gradient-2);
            padding: 1.5rem;
            border-radius: 20px;
            text-align: center;
            box-shadow: var(--shadow-glow);
            animation: badgePulse 2s infinite;
        }

        @keyframes badgePulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .exp-number { display: block; font-size: 2.5rem; font-weight: 800; color: var(--text-light); }
        .exp-text { font-size: 0.9rem; color: var(--text-muted); }

        .about-text h3 { font-size: 2rem; margin-bottom: 1rem; color: var(--accent); }
        .about-text > p { color: var(--text-muted); margin-bottom: 2rem; line-height: 1.8; }

        .personal-info { margin-bottom: 2rem; }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: rgba(66, 165, 245, 0.1);
            border-radius: 10px;
            border: 1px solid rgba(66, 165, 245, 0.2);
            transition: var(--transition);
        }

        .info-item:hover {
            transform: translateX(10px);
            background: rgba(66, 165, 245, 0.2);
            box-shadow: var(--shadow-glow);
        }

        .info-item i { font-size: 1.5rem; color: var(--accent); }
        .info-label { display: block; font-size: 0.85rem; color: var(--text-muted); }
        .info-value { display: block; font-weight: 600; color: var(--text-light); }

        .education-title { margin-top: 2rem; margin-bottom: 1.5rem; }

        .education-timeline {
            position: relative;
            padding-left: 2rem;
        }

        .education-timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 2px;
            height: 100%;
            background: var(--gradient-2);
        }

        .timeline-item { position: relative; padding-bottom: 2rem; }

        .timeline-dot {
            position: absolute;
            left: -2.35rem;
            top: 0;
            width: 16px;
            height: 16px;
            background: var(--accent);
            border-radius: 50%;
            border: 3px solid var(--primary);
            box-shadow: 0 0 10px var(--accent);
        }

        .timeline-content {
            background: rgba(66, 165, 245, 0.1);
            padding: 1.5rem;
            border-radius: 10px;
            border: 1px solid rgba(66, 165, 245, 0.2);
            transition: var(--transition);
        }

        .timeline-content:hover {
            transform: translateX(10px);
            box-shadow: var(--shadow-glow);
        }

        .timeline-year {
            display: inline-block;
            background: var(--gradient-2);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
        }

        .timeline-content h4 { color: var(--text-light); margin-bottom: 0.3rem; }
        .timeline-jurusan { color: var(--accent); font-weight: 500; }
        .timeline-ipk { display: inline-block; margin-top: 0.5rem; color: var(--text-muted); font-size: 0.9rem; }

        /* ===== SKILLS ===== */
        .skills { background: var(--primary-dark); }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .skill-card {
            background: rgba(66, 165, 245, 0.05);
            padding: 2rem;
            border-radius: 20px;
            border: 1px solid rgba(66, 165, 245, 0.2);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .skill-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-2);
            opacity: 0.1;
            transition: var(--transition-slow);
        }

        .skill-card:hover::before { left: 0; }

        .skill-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-glow);
            border-color: var(--accent);
        }

        .skill-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient-2);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: var(--text-light);
        }

        .skill-card h3 { margin-bottom: 1rem; color: var(--text-light); }

        .skill-bar {
            width: 100%;
            height: 10px;
            background: rgba(66, 165, 245, 0.2);
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }

        .skill-progress {
            height: 100%;
            background: var(--gradient-2);
            border-radius: 10px;
            width: 0;
            transition: width 1.5s ease;
            position: relative;
        }

        .skill-percent {
            position: absolute;
            right: 0;
            top: -25px;
            font-size: 0.85rem;
            color: var(--accent);
            font-weight: 600;
        }

        /* ===== EXPERIENCE ===== */
        .experience { background: var(--primary); }

        .experience-timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .experience-timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 3px;
            height: 100%;
            background: var(--gradient-2);
        }

        .exp-item {
            position: relative;
            width: 50%;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .exp-item:nth-child(odd) { left: 0; padding-right: 3rem; text-align: right; }
        .exp-item:nth-child(even) { left: 50%; padding-left: 3rem; }

        .exp-dot {
            position: absolute;
            width: 20px;
            height: 20px;
            background: var(--accent);
            border-radius: 50%;
            top: 2rem;
            box-shadow: 0 0 15px var(--accent);
            animation: dotPulse 2s infinite;
        }

        .exp-item:nth-child(odd) .exp-dot { right: -10px; }
        .exp-item:nth-child(even) .exp-dot { left: -10px; }

        @keyframes dotPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.3); }
        }

        .exp-content {
            background: rgba(66, 165, 245, 0.1);
            padding: 1.5rem;
            border-radius: 15px;
            border: 1px solid rgba(66, 165, 245, 0.2);
            transition: var(--transition);
        }

        .exp-content:hover {
            transform: scale(1.02);
            box-shadow: var(--shadow-glow);
        }

        .exp-year {
            display: inline-block;
            background: var(--gradient-2);
            padding: 0.3rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
        }

        .exp-content h3 { color: var(--accent); margin-bottom: 0.5rem; }
        .exp-content h4 { color: var(--text-muted); font-size: 1rem; margin-bottom: 0.5rem; font-weight: 500; }
        .exp-content h4 i { margin-right: 0.5rem; }
        .exp-content p { color: var(--text-muted); line-height: 1.6; }

        /* ===== CERTIFICATES ===== */
        .certificates { background: var(--primary-dark); }

        .cert-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .cert-card {
            background: rgba(66, 165, 245, 0.05);
            padding: 2rem;
            border-radius: 20px;
            border: 1px solid rgba(66, 165, 245, 0.2);
            display: flex;
            gap: 1.5rem;
            align-items: center;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .cert-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg, transparent, var(--accent), transparent);
            animation: rotateBorder 4s linear infinite;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .cert-card:hover::before { opacity: 0.1; }

        @keyframes rotateBorder {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .cert-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: var(--shadow-glow);
            border-color: var(--accent);
        }

        .cert-icon {
            width: 70px;
            height: 70px;
            background: var(--gradient-2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--text-light);
            flex-shrink: 0;
            animation: iconFloat 3s ease-in-out infinite;
        }

        @keyframes iconFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .cert-info h3 { color: var(--text-light); margin-bottom: 0.5rem; font-size: 1.1rem; }
        .cert-institution, .cert-year { color: var(--text-muted); font-size: 0.9rem; margin-bottom: 0.3rem; }
        .cert-institution i, .cert-year i { color: var(--accent); margin-right: 0.5rem; }

        /* ===== SERVICES ===== */
        .services { background: var(--primary); }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: rgba(66, 165, 245, 0.05);
            padding: 2.5rem;
            border-radius: 20px;
            border: 1px solid rgba(66, 165, 245, 0.2);
            text-align: center;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-2);
            opacity: 0;
            transition: var(--transition);
        }

        .service-card:hover::before { opacity: 0.1; }

        .service-card:hover {
            transform: translateY(-15px);
            box-shadow: var(--shadow-2);
            border-color: var(--accent);
        }

        .service-icon-wrapper {
            width: 100px;
            height: 100px;
            margin: 0 auto 1.5rem;
            background: var(--gradient-2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            animation: serviceFloat 3s ease-in-out infinite;
        }

        @keyframes serviceFloat {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(5deg); }
        }

        .service-icon { font-size: 3rem; }
        .service-card h3 { color: var(--accent); margin-bottom: 1rem; font-size: 1.3rem; position: relative; z-index: 1; }
        .service-card p { color: var(--text-muted); margin-bottom: 1.5rem; line-height: 1.6; position: relative; z-index: 1; }

        .service-price {
            display: inline-block;
            background: var(--gradient-2);
            padding: 0.5rem 1.5rem;
            border-radius: 20px;
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .service-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            position: relative;
            z-index: 1;
        }

        .service-btn:hover { gap: 1rem; color: var(--accent-light); }

        /* ===== CONTACT (DIPERBAIKI) ===== */
        .contact { 
            background: var(--primary-dark); 
            position: relative;
            overflow: hidden;
        }

        .contact::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 50%, rgba(66, 165, 245, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 80%, rgba(21, 101, 192, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: stretch;
            position: relative;
            z-index: 2;
        }

        .contact-info {
            opacity: 1 !important;
            transform: none !important;
        }

        .contact-info h3 { 
            font-size: 2rem; 
            color: var(--accent); 
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .contact-info h3::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--gradient-2);
            border-radius: 2px;
        }

        .contact-info > p { 
            color: var(--text-muted); 
            margin-bottom: 2rem; 
            line-height: 1.8;
            font-size: 1.05rem;
        }

        .contact-cards { 
            display: grid; 
            gap: 1rem; 
        }

        .contact-card {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            padding: 1.2rem 1.5rem;
            background: rgba(66, 165, 245, 0.08);
            border-radius: 15px;
            border: 1px solid rgba(66, 165, 245, 0.2);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .contact-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(66, 165, 245, 0.1), transparent);
            transition: left 0.5s;
        }

        .contact-card:hover::before {
            left: 100%;
        }

        .contact-card:hover {
            transform: translateX(8px);
            background: rgba(66, 165, 245, 0.15);
            box-shadow: var(--shadow-glow);
            border-color: var(--accent);
        }

        .contact-icon {
            width: 55px;
            height: 55px;
            background: var(--gradient-2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: var(--text-light);
            flex-shrink: 0;
            box-shadow: 0 5px 15px rgba(66, 165, 245, 0.3);
            transition: var(--transition);
        }

        .contact-card:hover .contact-icon {
            transform: rotate(360deg) scale(1.1);
        }

        .contact-card h4 { 
            color: var(--text-light); 
            margin-bottom: 0.2rem;
            font-size: 1rem;
            font-weight: 600;
        }
        .contact-card p { 
            color: var(--text-muted); 
            font-size: 0.95rem;
            margin: 0;
        }

        .contact-form {
            opacity: 1 !important;
            transform: none !important;
            background: rgba(66, 165, 245, 0.05);
            padding: 2.5rem;
            border-radius: 20px;
            border: 1px solid rgba(66, 165, 245, 0.2);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .contact-form::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--accent), transparent, var(--secondary), transparent);
            border-radius: 20px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .contact-form:hover::before {
            opacity: 0.3;
        }

        .contact-form h3 {
            color: var(--accent);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            text-align: center;
        }

        .contact-form h3::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background: var(--gradient-2);
            margin: 0.5rem auto 0;
            border-radius: 2px;
        }

        .form-group { 
            position: relative; 
            margin-bottom: 1.2rem; 
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            background: rgba(66, 165, 245, 0.08);
            border: 1px solid rgba(66, 165, 245, 0.3);
            border-radius: 10px;
            color: var(--text-light);
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 15px rgba(66, 165, 245, 0.3);
            background: rgba(66, 165, 245, 0.15);
            transform: translateY(-2px);
        }

        .form-group input::placeholder, .form-group textarea::placeholder { 
            color: var(--text-muted); 
        }
        .form-group i { 
            position: absolute; 
            left: 1rem; 
            top: 1rem; 
            color: var(--accent); 
            transition: var(--transition);
        }
        .form-group input:focus + i,
        .form-group textarea:focus + i {
            color: var(--accent-light);
            transform: scale(1.2);
        }
        .form-group textarea { resize: vertical; min-height: 120px; }
        .btn-full { 
            width: 100%; 
            justify-content: center;
            padding: 1rem 2rem;
            font-size: 1.05rem;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: var(--primary-dark);
            padding: 3rem 0 1rem;
            border-top: 1px solid rgba(66, 165, 245, 0.2);
        }

        .footer-container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3, .footer-section h4 { color: var(--accent); margin-bottom: 1rem; }
        .footer-section p { color: var(--text-muted); margin-bottom: 0.5rem; }
        .footer-section ul { list-style: none; }
        .footer-section ul li { margin-bottom: 0.5rem; }
        .footer-section ul li a { color: var(--text-muted); text-decoration: none; transition: var(--transition); }
        .footer-section ul li a:hover { color: var(--accent); padding-left: 5px; }
        .footer-section p i { color: var(--accent); margin-right: 0.5rem; }

        .social-links { display: flex; gap: 1rem; margin-top: 1rem; }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(66, 165, 245, 0.1);
            border: 1px solid rgba(66, 165, 245, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
            text-decoration: none;
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--gradient-2);
            color: var(--text-light);
            transform: translateY(-5px);
            box-shadow: var(--shadow-glow);
        }

        .footer-bottom { text-align: center; padding-top: 2rem; border-top: 1px solid rgba(66, 165, 245, 0.1); }
        .footer-bottom p { color: var(--text-muted); }

        /* ===== SCROLL TOP ===== */
        .scroll-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: var(--gradient-2);
            border: none;
            border-radius: 50%;
            color: var(--text-light);
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            box-shadow: var(--shadow-glow);
            z-index: 999;
        }

        .scroll-top.show { opacity: 1; visibility: visible; }
        .scroll-top:hover { transform: translateY(-5px); box-shadow: 0 0 30px rgba(66, 165, 245, 0.8); }

        /* ===== ANIMATIONS ===== */
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .animate-fade-in { animation: fadeIn 1s ease; }
        .animate-fade-in-right { animation: slideInRight 1s ease; }

        .reveal-left { opacity: 0; transform: translateX(-50px); transition: var(--transition-slow); }
        .reveal-left.active { opacity: 1; transform: translateX(0); }

        .reveal-right { opacity: 0; transform: translateX(50px); transition: var(--transition-slow); }
        .reveal-right.active { opacity: 1; transform: translateX(0); }

        .reveal-up { opacity: 0; transform: translateY(50px); transition: var(--transition-slow); }
        .reveal-up.active { opacity: 1; transform: translateY(0); }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 968px) {
            .hero-content { grid-template-columns: 1fr; text-align: center; }
            .hero-name { font-size: 2.5rem; }
            .hero-title { font-size: 1.5rem; }
            .hero-buttons { justify-content: center; }
            .hero-stats { justify-content: center; }
            .image-wrapper { width: 300px; height: 300px; }
            .about-content { grid-template-columns: 1fr; }
            .contact-content { grid-template-columns: 1fr; gap: 2rem; }
            .experience-timeline::before { left: 0; }
            .exp-item { width: 100%; left: 0 !important; padding-left: 2rem !important; padding-right: 0 !important; text-align: left !important; }
            .exp-dot { left: -10px !important; right: auto !important; }

            .nav-menu {
                position: fixed;
                top: 0;
                right: -100%;
                width: 70%;
                height: 100vh;
                background: var(--primary-dark);
                flex-direction: column;
                padding: 5rem 2rem;
                transition: var(--transition);
                box-shadow: var(--shadow-2);
            }
            .nav-menu.active { right: 0; }
            .hamburger { display: flex; }
        }

        @media (max-width: 768px) {
            .hero-name { font-size: 2rem; }
            .hero-title { font-size: 1.2rem; }
            .section-title { font-size: 2rem; }
            .info-grid { grid-template-columns: 1fr; }
            .hero-stats { flex-wrap: wrap; gap: 1rem; }
            .stat-number { font-size: 2rem; }
            .services-grid, .skills-grid, .cert-grid { grid-template-columns: 1fr; }
            .contact-form { padding: 1.5rem; }
            .contact-info h3 { font-size: 1.5rem; }
        }

        @media (max-width: 480px) {
            .hero-name { font-size: 1.8rem; }
            .hero-buttons { flex-direction: column; }
            .btn { width: 100%; justify-content: center; }
            .image-wrapper { width: 250px; height: 250px; }
            .container { padding: 0 1rem; }
            .section { padding: 4rem 0; }
        }

        /* Hide cursor trail on mobile */
        @media (max-width: 768px) {
            .cursor-dot { display: none; }
        }
    </style>
</head>
<body>
    <!-- Cursor Trail -->
    <div id="cursor-trail"></div>

    <!-- Particles -->
    <div class="particles-container" id="particles"></div>

    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="#home" class="logo">
                <span class="logo-icon">⚡</span>
                <span class="logo-text">{{ $data['nama'] }}</span>
            </a>
            <ul class="nav-menu" id="nav-menu">
                <li><a href="#home" class="nav-link active">Home</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#skills" class="nav-link">Skills</a></li>
                <li><a href="#experience" class="nav-link">Experience</a></li>
                <li><a href="#certificates" class="nav-link">Certificates</a></li>
                <li><a href="#services" class="nav-link">Services</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>
            </ul>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero" id="home">
        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-text animate-fade-in">
                    <p class="hero-greeting">Hello, I'm</p>
                    <h1 class="hero-name">{{ $data['nama'] }}</h1>
                    <h2 class="hero-title">
                        <span class="typing-text">{{ $data['judul'] }}</span>
                    </h2>
                    <p class="hero-description">{{ $data['tentang'] }}</p>
                    <div class="hero-buttons">
                        <a href="#contact" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Hubungi Saya
                        </a>
                        <a href="#services" class="btn btn-secondary">
                            <i class="fas fa-briefcase"></i> Lihat Layanan
                        </a>
                    </div>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <h3 class="stat-number" data-count="50">0</h3>
                            <p class="stat-label">Projects</p>
                        </div>
                        <div class="stat-item">
                            <h3 class="stat-number" data-count="30">0</h3>
                            <p class="stat-label">Clients</p>
                        </div>
                        <div class="stat-item">
                            <h3 class="stat-number" data-count="5">0</h3>
                            <p class="stat-label">Years Exp</p>
                        </div>
                    </div>
                </div>
                <div class="hero-image animate-fade-in-right">
                    <div class="image-wrapper">
                        <div class="floating-shape shape-1"></div>
                        <div class="floating-shape shape-2"></div>
                        <div class="floating-shape shape-3"></div>
                        <div class="profile-image">
                            <img src="{{ asset('images/profile.jpg') }}" alt="Profile">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
            <p>Scroll Down</p>
        </div>
    </section>

    <!-- About -->
    <section class="about section" id="about">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Get To Know</span>
                <h2 class="section-title">About Me</h2>
                <div class="title-decoration"></div>
            </div>
            <div class="about-content">
                <div class="about-image reveal-left">
                    <div class="about-img-wrapper">
                        <img src="{{ asset('images/WhatsApp Image 2026-06-21 at 12.07.38.jpeg') }}" alt="Profile">
                        <div class="experience-badge">
                            <span class="exp-number">2+</span>
                            <span class="exp-text">Tahun<br>Pengalaman</span>
                        </div>
                    </div>
                </div>
                <div class="about-text reveal-right">
                    <h3>Full Stack Developer & IT Technician</h3>
                    <p>{{ $data['tentang'] }}</p>
                    
                    <div class="personal-info">
                        <div class="info-grid">
                            <div class="info-item">
                                <i class="fas fa-user"></i>
                                <div>
                                    <span class="info-label">Nama</span>
                                    <span class="info-value">{{ $data['nama'] }}</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <span class="info-label">Email</span>
                                    <span class="info-value">{{ $data['email'] }}</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <span class="info-label">Telepon</span>
                                    <span class="info-value">{{ $data['telepon'] }}</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <span class="info-label">Lokasi</span>
                                    <span class="info-value">{{ $data['alamat'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="education-title">📚 Riwayat Pendidikan</h3>
                    <div class="education-timeline">
                        @foreach($data['pendidikan'] as $pendidikan)
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <span class="timeline-year">{{ $pendidikan['tahun'] }}</span>
                                <h4>{{ $pendidikan['sekolah'] }}</h4>
                                <p class="timeline-jurusan">{{ $pendidikan['jurusan'] }}</p>
                                @if(isset($pendidikan['ipk']))
                                <span class="timeline-ipk">IPK: {{ $pendidikan['ipk'] }}</span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills -->
    <section class="skills section" id="skills">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">My Abilities</span>
                <h2 class="section-title">Skills & Expertise</h2>
                <div class="title-decoration"></div>
            </div>
            <div class="skills-content">
                <div class="skills-grid">
                    @foreach($data['keahlian'] as $index => $keahlian)
                    <div class="skill-card reveal-up" style="animation-delay: {{ $index * 0.1 }}s">
                        <div class="skill-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3>{{ $keahlian['nama'] }}</h3>
                        <div class="skill-bar">
                            <div class="skill-progress" data-progress="{{ $keahlian['level'] }}">
                                <span class="skill-percent">{{ $keahlian['level'] }}%</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Experience -->
    <section class="experience section" id="experience">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">My Journey</span>
                <h2 class="section-title">Work Experience</h2>
                <div class="title-decoration"></div>
            </div>
            <div class="experience-timeline">
                @foreach($data['pengalaman'] as $index => $pengalaman)
                <div class="exp-item {{ $index % 2 == 0 ? 'reveal-left' : 'reveal-right' }}">
                    <div class="exp-dot"></div>
                    <div class="exp-content">
                        <span class="exp-year">{{ $pengalaman['tahun'] }}</span>
                        <h3>{{ $pengalaman['posisi'] }}</h3>
                        <h4><i class="fas fa-building"></i> {{ $pengalaman['perusahaan'] }}</h4>
                        <p>{{ $pengalaman['deskripsi'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services -->
     <section class="services section" id="services">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">What I Offer</span>
                <h2 class="section-title">My Services</h2>
                <div class="title-decoration"></div>
            </div>
            <div class="services-grid">
                @foreach($data['layanan'] as $index => $layanan)
                <div class="service-card reveal-up" style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="service-icon-wrapper">
                        <span class="service-icon">{{ $layanan['icon'] }}</span>
                    </div>
                    <h3>{{ $layanan['judul'] }}</h3>
                    <p>{{ $layanan['deskripsi'] }}</p>
                    <div class="service-price">
                        <i class="fas fa-tag"></i> {{ $layanan['harga'] }}
                    </div>
                    <a href="#contact" class="service-btn">
                        <i class="fas fa-arrow-right"></i> Order Now
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Certificates (FIXED - ANTI ERROR) -->
<section class="certificates section" id="certificates">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">My Achievements</span>
            <h2 class="section-title">Certificates & Awards</h2>
            <div class="title-decoration"></div>
        </div>
        <div class="cert-grid">
            @foreach($data['sertifikat'] as $index => $sertifikat)
            <div class="cert-card reveal-up" style="animation-delay: {{ $index * 0.15 }}s">
                <div class="cert-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <div class="cert-info">
                    <h3>{{ $sertifikat['nama'] }}</h3>
                    <p class="cert-institution"><i class="fas fa-university"></i> {{ $sertifikat['institusi'] }}</p>
                    
                    @if(isset($sertifikat['assignment']))
                    <p class="cert-institution"><i class="fas fa-briefcase"></i> {{ $sertifikat['assignment'] }}</p>
                    @endif
                    
                    @if(isset($sertifikat['level']))
                    <p class="cert-institution"><i class="fas fa-award"></i> Level: <strong style="color: var(--accent);">{{ $sertifikat['level'] }}</strong></p>
                    @endif
                    
                    <p class="cert-year"><i class="fas fa-calendar"></i> {{ $sertifikat['tahun'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

    <!-- Contact Section (DIPERBAIKI) -->
    <section class="contact section" id="contact">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Get In Touch</span>
                <h2 class="section-title">Contact Me</h2>
                <div class="title-decoration"></div>
            </div>
            
            <div class="contact-content">
                <!-- Kolom Kiri: Contact Info -->
                <div class="contact-info">
                    <h3>Let's Talk About Your Project!</h3>
                    <p>Hubungi saya untuk konsultasi gratis mengenai kebutuhan IT Anda. Saya siap membantu 24/7!</p>
                    
                    <div class="contact-cards">
                        <div class="contact-card">
                            <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                            <div>
                                <h4>Email</h4>
                                <p>{{ $data['email'] }}</p>
                            </div>
                        </div>
                        
                        <div class="contact-card">
                            <div class="contact-icon"><i class="fas fa-phone"></i></div>
                            <div>
                                <h4>Phone</h4>
                                <p>{{ $data['telepon'] }}</p>
                            </div>
                        </div>
                        
                        <div class="contact-card">
                            <div class="contact-icon"><i class="fab fa-whatsapp"></i></div>
                            <div>
                                <h4>WhatsApp</h4>
                                <p>{{ $data['telepon'] }}</p>
                            </div>
                        </div>
                        
                        <div class="contact-card">
                            <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <h4>Location</h4>
                                <p>{{ $data['alamat'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Contact Form -->
                <div class="contact-form">
                    <h3><i class="fas fa-paper-plane"></i> Send Message</h3>
                    <form id="contactForm">
                        <div class="form-group">
                            <input type="text" placeholder="Your Name" required>
                            <i class="fas fa-user"></i>
                        </div>
                        
                        <div class="form-group">
                            <input type="email" placeholder="Your Email" required>
                            <i class="fas fa-envelope"></i>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" placeholder="Subject" required>
                            <i class="fas fa-tag"></i>
                        </div>
                        
                        <div class="form-group">
                            <textarea placeholder="Your Message" rows="5" required></textarea>
                            <i class="fas fa-comment"></i>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-full">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>{{ $data['nama'] }}</h3>
                    <p>Full Stack Developer & IT Technician</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="https://www.linkedin.com/in/yusuf-maulana-653346416?utm_source=share_via&utm_content=profile&utm_medium=member_android"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.instagram.com/_maulaaa__?igsh=MXBpbHIyZDNlbjk4Ng=="><i class="fab fa-instagram"></i></a>
                        <a href="https://wa.me/62851342409011"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="#services">Service Laptop</a></li>
                        <li><a href="#services">Instalasi CCTV</a></li>
                        <li><a href="#services">Web Development</a></li>
                        <li><a href="#services">Networking</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Contact</h4>
                    <p><i class="fas fa-envelope"></i> {{ $data['email'] }}</p>
                    <p><i class="fas fa-phone"></i> {{ $data['telepon'] }}</p>
                    <p><i class="fas fa-map-marker-alt"></i> {{ $data['alamat'] }}</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} {{ $data['nama'] }}. All Rights Reserved</p>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <button class="scroll-top" id="scrollTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- ============================================
         ALL JAVASCRIPT INLINE
    ============================================= -->
    <script>
        // ===== CURSOR TRAIL =====
        class CursorTrail {
            constructor() {
                this.dots = [];
                this.maxDots = 20;
                this.init();
            }

            init() {
                document.addEventListener('mousemove', (e) => {
                    this.createDot(e.clientX, e.clientY);
                });

                const cursor = document.createElement('div');
                cursor.className = 'cursor-dot';
                document.body.appendChild(cursor);
                
                document.addEventListener('mousemove', (e) => {
                    cursor.style.left = e.clientX - 6 + 'px';
                    cursor.style.top = e.clientY - 6 + 'px';
                });
            }

            createDot(x, y) {
                const dot = document.createElement('div');
                dot.style.cssText = `
                    position: fixed;
                    left: ${x}px;
                    top: ${y}px;
                    width: 8px;
                    height: 8px;
                    background: hsl(${Math.random() * 60 + 200}, 100%, 60%);
                    border-radius: 50%;
                    pointer-events: none;
                    z-index: 99998;
                    box-shadow: 0 0 10px currentColor;
                    transition: all 0.5s ease;
                `;
                
                document.body.appendChild(dot);
                this.dots.push(dot);

                setTimeout(() => {
                    dot.style.opacity = '0';
                    dot.style.transform = 'scale(0)';
                }, 10);

                setTimeout(() => {
                    dot.remove();
                    this.dots.shift();
                }, 500);

                if (this.dots.length > this.maxDots) {
                    this.dots[0].remove();
                    this.dots.shift();
                }
            }
        }

        // ===== PARTICLES =====
        class ParticleSystem {
            constructor() {
                this.container = document.getElementById('particles');
                this.particleCount = 50;
                this.init();
            }

            init() {
                for (let i = 0; i < this.particleCount; i++) {
                    this.createParticle();
                }
            }

            createParticle() {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                const size = Math.random() * 5 + 2;
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDuration = (Math.random() * 20 + 10) + 's';
                particle.style.animationDelay = Math.random() * 5 + 's';
                
                this.container.appendChild(particle);
            }
        }

        // ===== NAVIGATION =====
        class Navigation {
            constructor() {
                this.navbar = document.getElementById('navbar');
                this.hamburger = document.getElementById('hamburger');
                this.navMenu = document.getElementById('nav-menu');
                this.navLinks = document.querySelectorAll('.nav-link');
                this.init();
            }

            init() {
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 50) {
                        this.navbar.classList.add('scrolled');
                    } else {
                        this.navbar.classList.remove('scrolled');
                    }
                    this.updateActiveLink();
                });

                this.hamburger.addEventListener('click', () => {
                    this.hamburger.classList.toggle('active');
                    this.navMenu.classList.toggle('active');
                });

                this.navLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        this.hamburger.classList.remove('active');
                        this.navMenu.classList.remove('active');
                    });
                });
            }

            updateActiveLink() {
                const sections = document.querySelectorAll('section[id]');
                const scrollY = window.scrollY + 100;

                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.offsetHeight;
                    const sectionId = section.getAttribute('id');

                    if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                        this.navLinks.forEach(link => {
                            link.classList.remove('active');
                            if (link.getAttribute('href') === '#' + sectionId) {
                                link.classList.add('active');
                            }
                        });
                    }
                });
            }
        }

        // ===== SCROLL ANIMATIONS =====
        class ScrollAnimations {
            constructor() {
                this.observerOptions = {
                    threshold: 0.1,
                    rootMargin: '0px 0px -100px 0px'
                };
                this.init();
            }

            init() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('active');
                            
                            if (entry.target.classList.contains('skill-card')) {
                                this.animateSkillBar(entry.target);
                            }
                        }
                    });
                }, this.observerOptions);

                document.querySelectorAll('.reveal-left, .reveal-right, .reveal-up, .skill-card').forEach(el => {
                    observer.observe(el);
                });
            }

            animateSkillBar(card) {
                const progressBar = card.querySelector('.skill-progress');
                const progress = progressBar.getAttribute('data-progress');
                setTimeout(() => {
                    progressBar.style.width = progress + '%';
                }, 200);
            }
        }

        // ===== COUNTER =====
        class CounterAnimation {
            constructor() {
                this.counters = document.querySelectorAll('.stat-number');
                this.init();
            }

            init() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            this.animateCounter(entry.target);
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.5 });

                this.counters.forEach(counter => observer.observe(counter));
            }

            animateCounter(counter) {
                const target = parseInt(counter.getAttribute('data-count'));
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        counter.textContent = target + '+';
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current) + '+';
                    }
                }, 16);
            }
        }

        // ===== SCROLL TOP =====
        class ScrollToTop {
            constructor() {
                this.button = document.getElementById('scrollTop');
                this.init();
            }

            init() {
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 500) {
                        this.button.classList.add('show');
                    } else {
                        this.button.classList.remove('show');
                    }
                });

                this.button.addEventListener('click', () => {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            }
        }

        // ===== TYPING EFFECT =====
        class TypingEffect {
            constructor() {
                this.texts = [
                    'Full Stack Developer',
                    'IT Technician',
                    'Web Developer',
                    'Network Engineer'
                ];
                this.currentIndex = 0;
                this.charIndex = 0;
                this.isDeleting = false;
                this.typingElement = document.querySelector('.typing-text');
                this.init();
            }

            init() {
                this.type();
            }

            type() {
                const currentText = this.texts[this.currentIndex];
                
                if (this.isDeleting) {
                    this.typingElement.textContent = currentText.substring(0, this.charIndex - 1);
                    this.charIndex--;
                } else {
                    this.typingElement.textContent = currentText.substring(0, this.charIndex + 1);
                    this.charIndex++;
                }

                let typeSpeed = this.isDeleting ? 50 : 100;

                if (!this.isDeleting && this.charIndex === currentText.length) {
                    typeSpeed = 2000;
                    this.isDeleting = true;
                } else if (this.isDeleting && this.charIndex === 0) {
                    this.isDeleting = false;
                    this.currentIndex = (this.currentIndex + 1) % this.texts.length;
                    typeSpeed = 500;
                }

                setTimeout(() => this.type(), typeSpeed);
            }
        }

        // ===== SMOOTH SCROLL =====
        class SmoothScroll {
            constructor() {
                this.init();
            }

            init() {
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', (e) => {
                        e.preventDefault();
                        const target = document.querySelector(anchor.getAttribute('href'));
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    });
                });
            }
        }

        // ===== CONTACT FORM =====
        class ContactForm {
            constructor() {
                this.form = document.getElementById('contactForm');
                this.init();
            }

            init() {
                if (this.form) {
                    this.form.addEventListener('submit', (e) => {
                        e.preventDefault();
                        alert('Terima kasih! Pesan Anda telah terkirim. Saya akan segera menghubungi Anda.');
                        this.form.reset();
                    });
                }
            }
        }

        // ===== INITIALIZE =====
        document.addEventListener('DOMContentLoaded', () => {
            new CursorTrail();
            new ParticleSystem();
            new Navigation();
            new ScrollAnimations();
            new CounterAnimation();
            new ScrollToTop();
            new TypingEffect();
            new SmoothScroll();
            new ContactForm();
        });
    </script>
</body>
</html>
