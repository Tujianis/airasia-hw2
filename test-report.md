T01 | Validation Test
go to /tests/validation-tests.php and view results. Expected results: 1 Pass, 4 Fail. Actual: 1 Pass, 4 Fail. PASS

T02 | View card list | 
go to /card-lists.php. Expected result should be 20 cards on a fresh sql run. Actual is 20 cards. PASS
T03 | View Card Details | from card-list, select 'view card' from any card, where it will go to card-details.php. Expected is to show all info not the id, with delete and edit buttons available. Actual is as expected. PASS
T04 | card-add.php will display form. Inputs of ['Test Name 33', 'Gift Card', 30.33, 3033] | Expected Result: New Card created. Actual Result: New card created. PASS
T05 | Update Card | from card list, select 'edit card', to go to card-update.php. Inputs of ['Test Name 34', 'Gift Card', 30.34, 3034]. Expected is card with same id to have different values. Actual output is same card with new values. PASS
T06 | delete-card.php and then select the confirmation button. Expected should be that card is no longer viewable. Actual is that the card is no longer viewable. PASS
T07 | Invalid/Altered Inputs | Invalid inputs entered on card-add/card-update. Expected is that no changes are made due to validation catching. Actual is that no changes are made due to validation. PASS
T08 | Invalid GC ID Handling | Assuming this is using a bad ID, using card-details.php with input of cardId=50. Expected is that the request fails. Actual is that the request fails. PASS.