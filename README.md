MMC
===

Mobile Medical Control

Welcome to my first Web App / Arduino project. If you have any comments or suggests, feel free to reach out to me at alexbukhta@gmail.com. Thank you!

---------

Welcome to Mobile Medical Control! This product is designed to allow you, a doctor, to control injections into your patients using an arduino system. In today's world, it's easy to get caught up in the whirlwind that is our lives. With this device, control your patient's injections from anywhere in the world that has internet connection! It consists of two medications contained in two IV's, and will then release either medication depending on your choice into the patient.

Using our device could not be simpler. Please let a dedicated medical technician set up the arduino system hooked up the the IV system. It will be a double rotating valve, so prepare two medications, each of which will be connected through tubing that is connected. Each patient will have access to one arduino, since only one patient can be hooked up to each IV. Also please let a dedicated technician set up a router that will be connected to the arduino. This router will be connected to the client that is hosting the server through apache and mysql servers, which will run our files. Using your mobile phone on this wireless router, you can contact the server being hosted at that server's ip (which we will use as 192.168.1.102 for this documentation; you can easily find it, by running ifconfig in the terminal of the client to see which IP it is broadcasting on) at http://192.168.1.102/mmc/html/login.php.

Once you are ready to connect, please log in to http://192.168.1.102/mmc/html/login.php and register your account. Then you will have several options. First, you may want to insert your patients and their medications. The way this is done, is by simply filling out the form at http://192.168.1.102/mmc/html/patient_input.php for each of your patients (keep in mind you can only have one patient of a unique name). You can then access this information at anytime in the patient information tab, or by accessing http://192.168.1.102/mmc/html/index.php. You can also see the initial admission date for the patient by visiting the patient history tab, or by visiting http://192.168.1.102/mmc/html/patient_history.php. You can then inject medication into the patient by filling out the short form called Apply Medication, which could be reached at http://192.168.1.102/mmc/html/medicate.php/ The medication will then be applied and you will be redirected to the medication history, which you can see at any time at http://192.168.1.102/mmc/html/medication_history.php. When the medication is being applied, you will see three lights go off, one per second. These lights let you know that the arduino is in action, and is not to be moved and the medication is not to be changed. Once you are done, be sure to log out so that no other person can access your patients!

If you have any other questions, please do not hesitate to contact your provider!
