<?php if(!defined('KIRBY')) exit ?>

title: Site
pages: default
fields:
  generalSettings:
    label: Site Settings
    type: headline
  title:
    label: Title
    type:  text
  description:
    label: Description
    type:  textarea
  showLanguageSelector:
    label: Show Language Selector?
    type: toggle
    text: yes/no
  brandName:
    label: Logo Text
    type: text
    icon: font
    width: 1/2
  menuSettings:
    label: Menu Settings
    type: headline
    help: This section will appear inside the menu.
  email:
    label: Email
    type: email
    width: 1/2
  phone:
    label: Phone
    type: tel
    width: 1/2
  socials:
    label: Social Links
    type: structure
    entry: >
      {{name}} - {{link}}
    fields:
      name:
        label: Name
        type: text
        icon: font
      link:
        label: Link
        type: url
  footerSettings:
    label: Footer Settings
    type: headline
    help: This section will appear on the footer.
  copyright:
    label: Copyright
    type:  textarea
