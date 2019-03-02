let user = window.App.user;

export function owns(model, prop = 'user_id') {
    return model[prop] === user.id;
}
