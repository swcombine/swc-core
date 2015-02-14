; HP status-related function helpers
(module-export
  (is-unharmed? (lambda (c)
    (eq? (get-hp-status-text c) "Unharmed")))
  (is-slightly-wounded? (lambda (c)
    (eq? (get-hp-status-text c) "Slightly Wounded")))
  (is-wounded? (lambda (c)
    (eq? (get-hp-status-text c) "Wounded")))
  (is-badly-wounded? (lambda (c)
    (eq? (get-hp-status-text c) "Badly Wounded"))))

