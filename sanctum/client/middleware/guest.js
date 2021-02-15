export default ({ app, redirect }) => {
  if (app.$auth.loggedIn) {
    return redirect("/home");
  } else return redirect("/");
};