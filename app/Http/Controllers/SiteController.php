<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Schedule;
use App\Models\Gallery;

class SiteController extends Controller
{
    public function index()
    {
        $mode = session('mode', 'travel');
        
        // Store the mode in session if not already set
        if (!session('mode')) {
            session(['mode' => $mode]);
        }
        
        // Filter packages by mode
        $packages = Package::where('is_active', true)
            ->where('mode', $mode)
            ->latest()
            ->take(6)
            ->get();
            
        // Filter schedules by mode
        $schedules = Schedule::where('is_active', true)
            ->where('mode', $mode)
            ->where('date', '>=', now())
            ->latest()
            ->take(4)
            ->get();
            
        // Filter galleries by mode
        $galleries = Gallery::where('is_active', true)
            ->where('mode', $mode)
            ->latest()
            ->take(8)
            ->get();
        
        // Hero background images - you can replace these with your own images
        $heroImages = [
            'travel' => $this->getHeroImage('travel'),
            'umroh' => $this->getHeroImage('umroh')
        ];

        // Logo images - you can replace these with your own logos
        $logos = [
            'travel' => $this->getLogo('travel'),
            'umroh' => $this->getLogo('umroh')
        ];
        
        return view('site.home', compact('packages', 'schedules', 'galleries', 'heroImages', 'logos', 'mode'));
    }

    /**
     * Get hero background image with responsive support
     */
    private function getHeroImage($mode)
    {
        // Use CSS background images from backgrounds.css
        $defaultImages = [
            'travel' => '/images/backgrounds/travel-desktop.jpg',
            'umroh' => '/images/backgrounds/umroh-desktop.png'
        ];
        
        return $defaultImages[$mode] ?? $defaultImages['travel'];
    }

    /**
     * Get logo with fallback support for multiple formats
     */
    private function getLogo($mode)
    {
        // Use default logos
        $defaultLogos = [
            'travel' => 'https://via.placeholder.com/200x80/3B82F6/FFFFFF?text=Srikandi+Travel',
            'umroh' => 'https://via.placeholder.com/200x80/10B981/FFFFFF?text=Srikandi+Umroh'
        ];
        
        return $defaultLogos[$mode] ?? $defaultLogos['travel'];
    }



    public function packages(Request $request)
    {
        $mode = $request->input('mode', session('mode', 'travel'));
        
        // Store the mode in session
        session(['mode' => $mode]);
        
        // Filter packages by mode
        $packages = Package::active()->where('mode', $mode)->get();
        
        // Get packages count by mode for navigation
        $packageCounts = [
            'travel' => Package::active()->where('mode', 'travel')->count(),
            'umroh' => Package::active()->where('mode', 'umroh')->count()
        ];
        
        // Logo images
        $logos = [
            'travel' => $this->getLogo('travel'),
            'umroh' => $this->getLogo('umroh')
        ];
        
        return view('site.packages', compact('packages', 'logos', 'mode', 'packageCounts'));
    }

    public function packageDetail(Package $package)
    {
        // Get related packages (same mode, different packages, limit 3)
        $relatedPackages = Package::where('is_active', true)
            ->where('mode', $package->mode)
            ->where('id', '!=', $package->id)
            ->latest()
            ->take(3)
            ->get();
        
        // Logo images
        $logos = [
            'travel' => $this->getLogo('travel'),
            'umroh' => $this->getLogo('umroh')
        ];
        
        return view('site.package-detail', compact('package', 'relatedPackages', 'logos'));
    }

    public function schedules(Request $request)
    {
        $mode = $request->input('mode', session('mode', 'travel'));
        
        // Store the mode in session
        session(['mode' => $mode]);
        
        // Filter schedules by mode
        $schedules = Schedule::active()
            ->where('mode', $mode)
            ->upcoming()
            ->get();
        
        // Get schedules count by mode for navigation
        $scheduleCounts = [
            'travel' => Schedule::active()->where('mode', 'travel')->upcoming()->count(),
            'umroh' => Schedule::active()->where('mode', 'umroh')->upcoming()->count()
        ];
        
        // Logo images
        $logos = [
            'travel' => $this->getLogo('travel'),
            'umroh' => $this->getLogo('umroh')
        ];
        
        return view('site.schedules', compact('schedules', 'logos', 'mode', 'scheduleCounts'));
    }

    public function gallery(Request $request)
    {
        $mode = $request->input('mode', session('mode', 'travel'));
        
        // Store the mode in session
        session(['mode' => $mode]);
        
        // Filter galleries by mode
        $galleries = Gallery::active()
            ->where('mode', $mode)
            ->get();
        
        // Get galleries count by mode for navigation
        $galleryCounts = [
            'travel' => Gallery::active()->where('mode', 'travel')->count(),
            'umroh' => Gallery::active()->where('mode', 'umroh')->count()
        ];
        
        // Logo images
        $logos = [
            'travel' => $this->getLogo('travel'),
            'umroh' => $this->getLogo('umroh')
        ];
        
        return view('site.gallery', compact('galleries', 'logos', 'mode', 'galleryCounts'));
    }

    public function contact(Request $request)
    {
        // Logo images
        $logos = [
            'travel' => $this->getLogo('travel'),
            'umroh' => $this->getLogo('umroh')
        ];
        
        return view('site.contact', compact('logos'));
    }

    public function switchMode(Request $request)
    {
        $mode = $request->input('mode');
        $request->session()->put('mode', $mode);
        
        return response()->json(['success' => true, 'mode' => $mode]);
    }

    public function about()
    {
        // Logo images
        $logos = [
            'travel' => $this->getLogo('travel'),
            'umroh' => $this->getLogo('umroh')
        ];
        
        return view('site.about', compact('logos'));
    }

    public function terms()
    {
        // Logo images
        $logos = [
            'travel' => $this->getLogo('travel'),
            'umroh' => $this->getLogo('umroh')
        ];
        
        return view('site.terms', compact('logos'));
    }

    public function privacy()
    {
        // Logo images
        $logos = [
            'travel' => $this->getLogo('travel'),
            'umroh' => $this->getLogo('umroh')
        ];
        
        return view('site.privacy', compact('logos'));
    }
}