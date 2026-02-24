<footer style="background:#111; border-top:1px solid #1e1e1e; margin-top:4rem; padding:3rem 0 2rem;">
    <div class="container-lg">

        <div style="display:grid; grid-template-columns:2fr 1fr 1fr; gap:2rem; margin-bottom:2.5rem;">
            <div>
                <div style="font-size:1.5rem; font-weight:900; color:#1db954; letter-spacing:-0.02em; margin-bottom:0.5rem;">
                    dinle<span style="color:#fff;">.tm</span>
                </div>
                <p style="font-size:0.8125rem; color:#b3b3b3; line-height:1.6; max-width:260px;">
                    Türkmenistanyň iň uly sazly platformasy. Aýdym-saz diňle, wideo tomaşa et.
                </p>
                <div style="display:flex; gap:0.75rem; margin-top:1.25rem;">
                    <a href="#" style="display:flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:50%;background:#282828;color:#b3b3b3;text-decoration:none;font-size:1rem;transition:background .15s,color .15s;"
                       onmouseenter="this.style.background='#0088cc';this.style.color='#fff'"
                       onmouseleave="this.style.background='#282828';this.style.color='#b3b3b3'">
                        <i class="bi bi-telegram"></i>
                    </a>
                    <a href="#" style="display:flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:50%;background:#282828;color:#b3b3b3;text-decoration:none;font-size:1rem;transition:background .15s,color .15s;"
                       onmouseenter="this.style.background='#e1306c';this.style.color='#fff'"
                       onmouseleave="this.style.background='#282828';this.style.color='#b3b3b3'">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" style="display:flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:50%;background:#282828;color:#b3b3b3;text-decoration:none;font-size:1rem;transition:background .15s,color .15s;"
                       onmouseenter="this.style.background='#1db954';this.style.color='#000'"
                       onmouseleave="this.style.background='#282828';this.style.color='#b3b3b3'">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>
            <div>
                <div style="font-size:0.7rem;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;color:#b3b3b3;margin-bottom:1rem;">Navigate</div>
                <div style="display:flex;flex-direction:column;gap:0.5rem;">
                    <a href="{{ route('home') }}" class="footer-link">Home</a>
                    <a href="{{ route('search') }}" class="footer-link">Search</a>
                    <a href="{{ route('videos.index') }}" class="footer-link">Videos</a>
                    <a href="{{ route('trends.index') }}" class="footer-link">Trends</a>
                </div>
            </div>
            <div>
                <div style="font-size:0.7rem;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;color:#b3b3b3;margin-bottom:1rem;">Info</div>
                <div style="display:flex;flex-direction:column;gap:0.5rem;">
                    <a href="{{ route('about.us') }}" class="footer-link">About Us</a>
                    <a href="{{ route('contact') }}" class="footer-link">Contact</a>
                    <a href="{{ route('team') }}" class="footer-link">Team</a>
                </div>
            </div>

        </div>
        <div style="border-top:1px solid #1e1e1e;padding-top:1.5rem;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:0.5rem;">
            <p style="font-size:0.8rem;color:#535353;">© {{ date('Y') }} dinle.tm — All rights reserved.</p>
            <p style="font-size:0.8rem;color:#535353;">Made with <span style="color:#1db954;">♥</span> in Turkmenistan</p>
        </div>

    </div>
</footer>

<style>
    .footer-link {
        font-size: 0.875rem;
        color: #b3b3b3;
        text-decoration: none;
        transition: color 0.15s;
    }
    .footer-link:hover { color: #fff; }

    @media (max-width: 640px) {
        footer > .container-lg > div:first-child {
            grid-template-columns: 1fr !important;
        }
    }
</style>