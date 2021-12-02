# Apply Theme to Specific Routes

There are situations when we need to apply a different theme to specific routes/urls. 
I personally came across this situation when dealing with a third-party theme.
The theme broke a third-party module's view in multiple places.
The one thing I found common on all these are the URL starts with a specific term.

In this snippet we override the default theme for those specific urls using Magento's observers.

## What we will do
- Create an `events.xml` file which listens for a particular event.
- Declare an observer which perform the required logic when the event occurs.
