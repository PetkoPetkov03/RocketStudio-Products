let feedbackState = false;

const rules = {
    "empty": "input shouldn't be empty",
    "type": "input is the wrong type",
    "wInputNum": "input number should be grater than 0"
};

class RuleSet {
    constructor(target) {
        this.target = target;
        this.rules = {};
    }

    add_rule(name, fn) {
        this.rules[name] = fn;
    }

    check() {
        const messages = [];
        for (const [name, fn] of Object.entries(this.rules)) {
            if (!fn(this.target.value)) { 
                messages.push(rules[name]);
            }
        }
        return messages;
    }
}

function checkRules(inputs) {
    const rule_sets = [];

    inputs.forEach(input => {
        const rs = new RuleSet(input);
        rs.add_rule("empty", val => val.trim() !== "");
        if (input.type === "number") {
            rs.add_rule("type", val => !isNaN(val) && val !== "");
            
            rs.add_rule("wInputNum", val => (Number(val) > 0));
        }
        
        rule_sets.push(rs);
    });

    return rule_sets;
}

window.addEventListener("DOMContentLoaded", () => {
    const inputs = Array.from(document.getElementsByClassName('validate'));
    const feedback = document.getElementById("feedback");

    feedback.hidden = feedbackState;

    const rule_sets = checkRules(inputs);

    inputs.forEach((input, index) => {
        input.addEventListener("input", () => {
            let allMessages = [];
            rule_sets.forEach(rs => {
                const messages = rs.check();
                if (messages.length > 0) {
                    allMessages.push(`${rs.target.placeholder}: ${messages.join(", ")}`);
                }
            });

            if (allMessages.length > 0) {
                feedback.hidden = false;
                feedback.innerHTML = "<ul>" + allMessages.map(msg => `<li>${msg}</li>`).join("") + "</ul>";
            } else {
                feedback.hidden = true;
                feedback.innerHTML = "";
            }
        });
    });
});
