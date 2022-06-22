ALTER TABLE `purposes`
  DROP `request_amount`,
  DROP `request_amount_idr`;

ALTER TABLE `purposes` CHANGE `bank_account_id` `bank_account` VARCHAR(100) NOT NULL;

ALTER TABLE `purposes` ADD `notes` VARCHAR(100) NULL AFTER `action_by`;

ALTER TABLE `purpose_items`
  DROP `amount`,
  DROP `description`;

ALTER TABLE `purpose_items` ADD `qty` INT DEFAULT 0 AFTER `name`, ADD `price` INT DEFAULT 0 AFTER `qty`;