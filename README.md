# What does it do

This extension adds the possibility to create dynamic timelines for your TYPO3 project.

![image](https://user-images.githubusercontent.com/17744843/84768193-1ea0be80-afd4-11ea-824e-a3eb7432a48f.png)

# Usage

You can create timeline-records inside of a storage folder. 
A timeline-record contains epochs, which define a timerange each.
Inside of an epoch you can create moments, which are getting displayed in the frontend via tooltip.

To view your timeline in frontend you simply create the "Timeline"-Plugin and select the timelines you want to see.

# Assets

You may include the SCSS and JavaScript files from this Extension. We provide popper.js with polyfills for IE11-usage.

```
includeJSFooter.popper = EXT:timeline/Resources/Private/JavaScript/popper.js
includeJSFooter.timeline = EXT:timeline/Resources/Private/JavaScript/timeline.js
```

Include the scss-file in your bundler.

```
/path/to/timeline/Resources/Private/Scss/Timeline.scss
```

Otherwise you can write your own styles and scripts to match your design.
