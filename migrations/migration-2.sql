ALTER TABLE `purposes` ADD `status_dana` VARCHAR(100) NULL AFTER `status`;
ALTER TABLE `purposes` ADD `note_status_dana` VARCHAR(100) NULL AFTER `status_dana`;
ALTER TABLE `purposes` ADD `status_dana_action_by` VARCHAR(100) NULL AFTER `note_status_dana`;

INSERT INTO role_routes(role_id,route_path) VALUES (3, 'purposes/finance-done');
INSERT INTO role_routes(role_id,route_path) VALUES (3, 'purposes/finance-cancel');