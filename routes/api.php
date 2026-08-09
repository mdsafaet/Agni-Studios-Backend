<?php

use App\Http\Controllers\Api\AboutSettingController;
use App\Http\Controllers\Api\BrandSettingController;
use App\Http\Controllers\Api\ContactMessageController;
use App\Http\Controllers\Api\FooterController;
use App\Http\Controllers\Api\GameSlideController;
use App\Http\Controllers\Api\HeroSectionController;
use App\Http\Controllers\Api\RustyBeatSlideController;
use App\Http\Controllers\Api\RustyCommunitySlideController;
use App\Http\Controllers\Api\RustyCompanionSectionController;
use App\Http\Controllers\Api\RustyPressKitAboutSectionController;
use App\Http\Controllers\Api\RustyPressKitContactSocialSectionController;
use App\Http\Controllers\Api\RustyPressKitDescriptionSectionController;
use App\Http\Controllers\Api\RustyPressKitFactSheetController;
use App\Http\Controllers\Api\RustyPressKitGifSectionController;
use App\Http\Controllers\Api\RustyPressKitHeroSectionController;
use App\Http\Controllers\Api\RustyPressKitKeyArtSectionController;
use App\Http\Controllers\Api\RustyPressKitLogoSectionController;
use App\Http\Controllers\Api\RustyPressKitPressReleaseController;
use App\Http\Controllers\Api\RustyPressKitScreenshotSectionController;
use App\Http\Controllers\Api\RustyPressKitSectionController;
use App\Http\Controllers\Api\RustyRevolverBeatSlideController;
use App\Http\Controllers\Api\RustyRevolverButtonController;
use App\Http\Controllers\Api\RustyRevolverJoinSectionController;
use App\Http\Controllers\Api\RustyTrailerSectionController;
use App\Http\Controllers\Api\SeoSettingController;
use App\Http\Controllers\Api\WorkflowStepController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hero-section', [HeroSectionController::class, 'show']);
Route::get('/footer', [FooterController::class, 'show']);
Route::get('/game-slides', [GameSlideController::class, 'index',]);
Route::get('/workflow-steps', [WorkflowStepController::class, 'index']);
Route::get('/about-section', [AboutSettingController::class, 'show']);
Route::get('/seo-settings/{page?}', [SeoSettingController::class, 'show']);

Route::get('/brand-settings',[BrandSettingController::class, 'show']);

Route::post('/contact-messages', [ContactMessageController::class, 'store'])
    ->middleware('throttle:5,1');


// Rusty Revolver Buttons API Route
Route::get('/rusty-revolver/buttons', [RustyRevolverButtonController::class, 'index']);
Route::get('/rusty-revolver/join-section',[RustyRevolverJoinSectionController::class, 'show']);
Route::get('/rusty-revolver/beat-slides',[RustyBeatSlideController::class, 'index']);
Route::get('/rusty-revolver/companion-section',[RustyCompanionSectionController::class, 'show']);
Route::get('/rusty-revolver/trailer-section',[RustyTrailerSectionController::class, 'show']);
Route::get( '/rusty-revolver/press-kit-section', [RustyPressKitSectionController::class, 'show']);
Route::get('/rusty-revolver/community-slides',[RustyCommunitySlideController::class, 'index']);


// Rusty Press Kit 
Route::get('/rusty-revolver/press-kit/hero-section',[RustyPressKitHeroSectionController::class,'show',]);
Route::get('/rusty-revolver/press-kit/about-section',[RustyPressKitAboutSectionController::class,'show',]);
Route::get('/rusty-revolver/press-kit/description-section',[ RustyPressKitDescriptionSectionController::class,'show',]);

Route::get('/rusty-revolver/press-kit/fact-sheet',[RustyPressKitFactSheetController::class,'show',]);
Route::get('/rusty-revolver/press-kit/logo-section',[RustyPressKitLogoSectionController::class,'show',]);
Route::get('/rusty-revolver/press-kit/key-art-section',[RustyPressKitKeyArtSectionController::class,'show',]);
Route::get('/rusty-revolver/press-kit/screenshots',[RustyPressKitScreenshotSectionController::class,'show',]);
Route::get('/rusty-revolver/press-kit/gifs',[RustyPressKitGifSectionController::class,'show', ]);
Route::get('/rusty-revolver/press-kit/press-releases',[RustyPressKitPressReleaseController::class,'index',]);
Route::get('/rusty-revolver/press-kit/contact-social-media',[RustyPressKitContactSocialSectionController::class,'show',]);







Route::get('/test', function () {
    return response()->json([
        'success' => true,
        'message' => 'Agni Studios API is working',

    ]);
});
